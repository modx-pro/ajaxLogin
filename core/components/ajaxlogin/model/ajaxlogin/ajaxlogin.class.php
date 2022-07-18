<?php

class ajaxLogin
{
    /** @var modX $modx */
    public $modx;

    var $value = array('Login', 'ForgotPassword', 'Register');


    /**
     * ajaxLogin constructor.
     * @param modX $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = array())
    {
        $this->modx =& $modx;

        $corePath = $this->modx->getOption('ajaxlogin_core_path', $config,
            $this->modx->getOption('core_path') . 'components/ajaxlogin/'
        );
        $assetsUrl = $this->modx->getOption('ajaxlogin_assets_url', $config,
            $this->modx->getOption('assets_url') . 'components/ajaxlogin/'
        );

        $actionUrl = $assetsUrl . 'action.php';

        $this->config = array_merge(array(
            'assetsUrl' => $assetsUrl,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
            'imagesUrl' => $assetsUrl . 'images/',
            'actionUrl' => $actionUrl,
            'loading' => $assetsUrl . 'img/loading.gif',

            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'chunksPath' => $corePath . 'elements/chunks/',
            'templatesPath' => $corePath . 'elements/templates/',
            'snippetsPath' => $corePath . 'elements/snippets/',
        ), $config);

        $this->modx->addPackage('ajaxlogin', $this->config['modelPath']);
        $this->modx->lexicon->load('ajaxlogin:default');
    }

    /**
     * @param $action
     * @return mixed
     */
    public function initialize($action)
    {
        if (in_array($action['action'], $this->value)) {
            $scriptProperties = $_SESSION['ajaxLogin'];
            $scriptProperties['tplType'] = 'modChunk';

            $response = $this->process($action['action'], $scriptProperties);

            if (isset($action['get']) && $action['get'] == 1) {
                $response = preg_replace("/<span.*class=\"error\".*>(.*)<\/span>/", '', $response);
            }

            if ($response) {
                return $this->success($response);
            } else {
                return $this->error('ajaxlogin_err_error');
            }
        } else {

            return $this->error('ajaxlogin_err_get_form');
        }
    }

    /**
     * @param $name
     * @param array $scriptProperties
     * @return mixed
     */
    public function process($name, array $scriptProperties)
    {
        if ($snippet = $this->modx->getObject('modSnippet', array('name' => $name))) {
            $properties = $snippet->getProperties();
            $scriptProperties = array_merge($properties, $scriptProperties);

            $snippet->_cacheable = false;
            $snippet->_processed = false;

            if ($name === 'Register') {
                unset($scriptProperties['errTpl']);
                $response = $snippet->process($scriptProperties);
                $response .= $this->getChunk($scriptProperties['registerTpl']);
            } else {
                $response = $snippet->process($scriptProperties);
            }

            return $this->getParserTag($response);

        } else {
            return $this->modx->log(modX::LOG_LEVEL_ERROR,
                $this->modx->lexicon('ajaxlogin_err_snippet') . $name
            );
        }
    }


    /**
     * Распарсить теги MODX при AJAX запросе
     * @param $content
     * @return mixed
     */
    private function getParserTag($content)
    {
        $maxIterations = (integer) $this->modx->getOption('parser_max_iterations', null, 10);
        $this->modx->getParser()
            ->processElementTags('', $content, false, false, '[[', ']]', array(), $maxIterations);
        $this->modx->getParser()
            ->processElementTags('', $content, true, true, '[[', ']]', array(), $maxIterations);

        return $content;
    }

    /**
     * @param $name
     * @param array $property
     * @return bool
     */
    public function getChunk($name, $property = array()) {
        $chunk = null;

        if (!isset($this->chunks[$name])) {
            $chunk = $this->modx->getObject('modChunk', array('name' => $name));

            if (empty($chunk) || !is_object($chunk)) {
                $chunk = $this->_getTplChunk($name);

                if ($chunk == false)
                    return false;
            }

            $this->chunks[$name] = $chunk->getContent();
        } else {
            $o = $this->chunks[$name];
            $chunk = $this->modx->newObject('modChunk');
            $chunk->setContent($o);
        }
        $chunk->setCacheable(false);

        return $chunk->process($property);
    }

    /**
     * @param $name
     * @return bool
     */
    private function _getTplChunk($name) {
        $chunk = FALSE;
        $postfix = 'chunk.'. strtolower($name). '.tpl';

        $f = $this->config['chunksPath'] . $postfix;

        if (file_exists($f)) {
            $o = file_get_contents($f);
            $chunk = $this->modx->newObject('modChunk');
            $chunk->set('name', $name);
            $chunk->setContent($o);
        }

        return $chunk;
    }

    /**
     * @param $data
     * @param array $response
     * @return mixed
     */
    private function success($data, $response = array())
    {
        $response['success'] = true;
        $response['data'] = $data;

        return $this->response($response);
    }

    /**
     * @param $message
     * @param array $response
     * @return mixed
     */
    private function error($message, $response = array())
    {
        $response['success'] = false;
        $response['message'] = $this->modx->lexicon($message);

        return $this->response($response);
    }

    /**
     * @param array $response
     * @return mixed
     */
    private function response(array $response)
    {
        return $this->modx->toJSON($response);
    }

}