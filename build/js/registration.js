(function($) {
    'use strict';

    var model = {
        form: null,
        emailInput: null,
        legalInput: null,
        submitButton: null,

        init: function(form, email, legal, submit) {
            this.form = form;
            this.emailInput = email;
            this.legalInput = legal;
            this.submitButton = submit;

            this.legalInput.addEventListener("change", RegistrationController.handleLegalChange);
            this.emailInput.addEventListener("blur", RegistrationController.handleEmailBlur);
            this.submitButton.addEventListener("click", RegistrationController.handleSubmit);
        },

        validateEmail: function(email) {
            var regExp = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (email === "" || !regExp.test(email)) {
                return false;
            }
            return true;
        },

        getEmail: function() {
            return this.emailInput.value;
        }

    }

    var RegistrationController = {
        setForm: function(form, email, legal, submit) {
            model.init(form, email, legal, submit);
        },

        handleLegalChange: function(event) {
            if (model.legalInput.checked) {
                model.submitButton.disabled = false;
            } else {
                model.submitButton.disabled = true;
            }
        },

        handleEmailBlur: function(event) {
            if (!model.validateEmail(model.getEmail())) {
                RegistrationView.addError(model.emailInput.parentNode, model.emailInput.id);
            } else {
                RegistrationView.removeError(model.emailInput.parentNode, model.emailInput.id);
            }
        },

        handleSubmit: function(event) {
            model.form.submit();
        },
    }

    var RegistrationView = {
        init: function() {
            RegistrationController.setForm(
                document.getElementById("registration-form"),
                document.getElementById("email"),
                document.getElementById("legal"),
                document.getElementById("submit-button"));
        },

        addError: function(node, key) {
            if (!node.classList.contains("has-error")) {
                node.classList.add("has-error");

                var errorMsg = document.createElement("span");
                errorMsg.id = key + "-error";
                errorMsg.className = "help-block";

                var textnode = document.createTextNode("Nesprávne zadaný email. Prosím, opravte pred odoslaním.");
                errorMsg.appendChild(textnode);

                node.appendChild(errorMsg);
            }
        },

        removeError: function(node, key) {
            if (node.classList.contains("has-error")) {
                node.classList.remove("has-error");
                node.removeChild(document.getElementById(key + "-error"));
            }
        }

    }

    $(function() {
        RegistrationView.init();
    });

}(jQuery));