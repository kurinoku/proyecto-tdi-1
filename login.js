
var loginHook = (() => {
    "use strict";
    let hook = (formSelector) => {
        let form = document.querySelector(formSelector);

        let getFormEditableInputs = () => {
            return Array.prototype.filter.call(
                form.querySelectorAll('input'),
                (x) => ["text", "password"].indexOf(x.type) > -1
            );
        };

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            new FormData(form);
        });

        form.addEventListener('formdata', (e) => {
            let data = e.formData;
            let request = new XMLHttpRequest();
            request.responseType = 'json';
            request.open(form.method, form.action);

            request.onload = (e) => {
                let response = request.response;
                if (response.estado == 'success') {
                    location = response.location;
                } else {
                    getFormEditableInputs().forEach((x) => {
                        x.value = "";
                    });
                }
            };

            request.send(data);
        });
    };

    return hook;
})();