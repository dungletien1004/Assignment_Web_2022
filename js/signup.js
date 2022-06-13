function Validator(options) {
  function validate(inputElement, rule) {
    var errorElement = inputElement.parentElement.querySelector(options.error);
    var errorMessage = rule.test(inputElement.value);
    if (errorMessage) {
      errorElement.innerText = errorMessage;
    } else {
      errorElement.innerText = "";
    }
  }
  var formElement = document.querySelector(options.form);
  if (formElement) {
    options.rules.forEach(function (rule) {
      var inputElement = formElement.querySelector(rule.selector);
      var errorElement = inputElement.parentElement.querySelector(
        options.error
      );
      if (inputElement) {
        inputElement.onblur = function () {
          validate(inputElement, rule);
        };
        inputElement.oninput = function () {
          errorElement.innerText = "";
        };
      }
    });
  }
}

Validator.isRequired = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      return value.trim() ? undefined : "Vui lòng nhập họ và tên";
    },
  };
};

Validator.isUsername = function (selector) {
  return {
    selector: selector,
    test: function (value) {
      return value.trim() ? undefined : "Vui lòng nhập tên đăng nhập";
    },
  };
};
Validator.isPass = function (selector, min) {
  return {
    selector: selector,
    test: function (value) {
      return value.length >= 6
        ? undefined
        : `Vui lòng nhập tối thiểu ${min} ký tự`;
    },
  };
};
Validator.isConfirmed = function (selector, getConfirmValue, message) {
  return {
    selector: selector,
    test: function (value) {
      return value === getConfirmValue() ? undefined : message;
    },
  };
};
