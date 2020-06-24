/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/default.js":
/*!*********************************!*\
  !*** ./resources/js/default.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(n); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

window.checkMail = function () {
  var message = {
    "lastName": $('#lastName').value,
    "firstName": $('#firstName').value,
    "email": $('#email').value,
    "object": $('#object').value,
    "content": $('#content').value
  };
  var verifyForm = true;

  for (var _i = 0, _Object$entries = Object.entries(message); _i < _Object$entries.length; _i++) {
    var _Object$entries$_i = _slicedToArray(_Object$entries[_i], 2),
        key = _Object$entries$_i[0],
        value = _Object$entries$_i[1];

    if (value === "") {
      displayAlert("Please fill the field " + key);
      verifyForm = false;
      break;
    }
  }

  verifyForm ? sendMail(message) : false;
};

window.sendMail = function (message) {
  fetch("https://sneakerx-webstart.herokuapp.com/contact/sendmail/", {
    method: 'POST',
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').getAttribute('content'),
      "Content-Type": "application/json"
    },
    body: JSON.stringify(message)
  }).then(function (res) {
    return res.json();
  }).then(function (res) {
    res ? displayAlert("Email send with success", 1) : displayAlert("Error please try again later");
  });
};

window.displayAlert = function (message) {
  var success = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
  var AlertMessage = $('.alert-message');
  AlertMessage.innerHTML = message;
  success ? AlertMessage.style.backgroundColor = '#27ae60' : AlertMessage.style.backgroundColor = '#c0392b';
  $('.alert').style.top = '5px';
  setTimeout(function () {
    $('.alert').style.top = '-45px';
  }, 5000);
};

window.$ = function $(selector) {
  return document.querySelector(selector);
};

window.eventOnAll = function (allDOM, fnct) {
  allDOM.forEach(function (dom) {
    return dom.addEventListener('click', fnct);
  });
};

window.getValue = function (elem) {
  var search = document.querySelector('#search').value;

  if (search !== "" && elem.key === "Enter" && search !== undefined || elem.key === undefined && search !== "" && search !== undefined) {
    LaunchSearch(search);
  }
};

window.LaunchSearch = function (search) {
  document.location.href = "/search/" + search;
};

window.addToBasket = function (idProduct) {
  var quantity = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 1;
  fetch('/tool/addToBasket?id=' + idProduct + '&quantity=' + quantity).then(function (response) {
    return response.json();
  }).then(function (res) {
    return res ? incrementBasket() : displayAlert("Your product could not be added to your basket");
  });
};

window.incrementBasket = function () {
  var nbr = document.querySelector('.countArticles');

  if (nbr) {
    var elem = parseInt(nbr.innerText);
    elem += 1;
    nbr.innerHTML = elem.toString();
  } else {
    var header = document.querySelector('.menu').innerHTML;
    document.querySelector('.menu').innerHTML = header + "\n        <div class=\"sticker\">\n\n            <span class=\"countArticles\">\n\n                1\n\n            </span>\n\n        </div>\n";
  }
};

document.querySelector('#search').addEventListener("keyup", function (evt) {
  return getValue(evt);
});
document.querySelector('.search').addEventListener("click", function (evt) {
  return getValue(evt);
});

/***/ }),

/***/ 5:
/*!***************************************!*\
  !*** multi ./resources/js/default.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\wamp64\www\Projects\sneakerx\resources\js\default.js */"./resources/js/default.js");


/***/ })

/******/ });