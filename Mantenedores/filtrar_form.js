
var filtrarFormHook = (() => {
    "use strict";

    let hook = (form, pkField, onFailSend) => {
        let doSend = true;
        let formChildren = () => form.querySelectorAll('input[type="text"]');
        Array.prototype.forEach.call(formChildren(), (x) => {
            x.whenSubmitting = () => !x.value.trim() == "";
        });

        pkField.whenSubmitting = () => {
            if (pkField.value.trim() == "") {
                doSend = false;
                return false;
            }
            return true;
        };

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            doSend = true;
            new FormData(form);
        });

        form.addEventListener('formdata', (e) => {
            let data = e.formData;
            Array.prototype.forEach.call(
                formChildren(),
                (child) => {
                    if (!child.whenSubmitting()) {
                        data.delete(child.name);
                    }
                });
            if (doSend) {
                let request = new XMLHttpRequest();
                request.open(form.method, form.action);
                request.send(data);
                request.onloadend = () => {location = location.href;};
            } else {
                onFailSend();
            }
        });

    };

    return hook;
})();
