const AjaxLogin = {
    actionType: '',
    actionPatch: '',
    redirectId: {},
    ctx: '',
    redirect: '',
    loading: '',
    selector: {
        modalId: '#ajaxlogin-modal',
        formBoxId: '#ajaxLoginForm',
        classBtn: '.ajaxlogin-btn',
        classItem: '.ajaxlogin',
        classReply: '.ajaxmodal-reply'
    },
    modal: null,
    formWrapper: null,

    initialize(config) {
        this.actionPatch = config.actionUrl;
        this.redirectId['Login'] = this.redirectLoginResId;
        this.redirectId['Register'] = this.redirectSubmitResId;
        this.ctx = config.ctx;
        this.loading = `<div class="ajaxmodal-reply"><span><img src="${config.loading}"></span></div>`;
        this.modal = document.querySelector(this.selector.modalId);
        this.formWrapper = document.querySelector(this.selector.formBoxId);

        document.addEventListener('click', (e) => {
            const target = e.target.closest(this.selector.classBtn);

            if (!target) return;
            e.preventDefault();

            this.actionType = target.dataset.ajaxlogin;

            if (!this.actionType) return;

            document.querySelectorAll(this.selector.classItem).forEach(item => item.classList.remove('active'));
            document.querySelector(`${this.selector.classItem}-${this.actionType}`).classList.add('active');
            this.setLoading();

            const sendData = new FormData();

            sendData.append('action', this.actionType);
            sendData.append('ctx', this.ctx);

            if (this.actionType === 'Register') {
                sendData.append('get', 1);
            }

            this.send(sendData);
        });
    },

    sendHandler() {
        this.modal.querySelector('form')?.addEventListener('submit', (e) => {
            e.preventDefault();
            const sendData = new FormData(e.target);

            sendData.append('action', this.actionType);
            sendData.append('ctx', this.ctx);

            this.redirect = this.redirectId[this.actionType] || '';

            this.setLoading();
            this.send(sendData);
        });
    },

    setLoading() {
        this.formWrapper.innerHTML = this.loading;
    },

    send(sendData) {
        fetch(this.actionPatch, {
            method: 'POST',
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: sendData
        })
            .then(response => response.json())
            .then(data => {
                if (typeof data !== 'object' || data.success !== true) {
                    const message = data?.message || 'Unknown error when submitting form!';
                    document.querySelector(this.selector.classReply).innerHTML = `<span class="text-danger">${message}</span>`;
                    return;
                }

                this.formWrapper.innerHTML = data.data;
            })
            .catch(() => {
                location.href = this.redirect || window.location.href;
            })
            .finally(() => {
                this.sendHandler();
            });
    }
};
