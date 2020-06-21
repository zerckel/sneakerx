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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/basket.js":
/*!********************************!*\
  !*** ./resources/js/basket.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(n); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

function _iterableToArrayLimit(arr, i) { if (typeof Symbol === "undefined" || !(Symbol.iterator in Object(arr))) return; var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

eventOnAll(document.querySelectorAll('#quantity'), updateQuantity);
$('#order').addEventListener('click', slideDownInfoUser);

function updateQuantity() {
  var newQuantity = 0;
  var oldQuantity = document.querySelector('.totalQuantity').innerHTML;
  document.querySelectorAll('#quantity').forEach(function (input) {
    return newQuantity += parseInt(input.value);
  });
  document.querySelector('.totalQuantity').innerHTML = newQuantity;
  updatePrice(this, oldQuantity, newQuantity);
}

function updatePrice(elem, oldQuantity, newQuantity) {
  var price = elem.parentNode.parentNode.parentNode.querySelector('.price').innerHTML;
  var totalPrice = document.querySelector('.totalPrice').innerHTML;
  totalPrice = oldQuantity > newQuantity ? parseInt(totalPrice) - parseInt(price) : parseInt(totalPrice) + parseInt(price);
  document.querySelector('.totalPrice').innerHTML = totalPrice.toString();
}

function slideDownInfoUser() {
  var button = $('.form');
  button.style.maxHeight = '1000px';
  document.querySelector('#order').addEventListener('click', confirmOrder);
  setTimeout(function () {
    document.location.href = "/basket/#order";
  }, 500);
}

function confirmOrder() {
  var userInfo = checkPersonalInfo();

  if (userInfo) {
    fetch("/confirmation/", {
      method: 'POST',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').getAttribute('content'),
        "Content-Type": "application/json"
      },
      body: JSON.stringify([checkArticles(), userInfo])
    }).then(function (response) {
      return response.json();
    }).then(function (res) {
      res.success ? window.location.href = "/confirmation/" : false;
    });
  }
}

window.checkArticles = function () {
  var articles = [];
  document.querySelectorAll('.article').forEach(function (res) {
    var article = {
      "id": res.dataset.id,
      "name": res.querySelector('.name').innerHTML,
      "img": res.querySelector('.img').src,
      "price": res.querySelector('.price').innerHTML,
      "color": res.querySelector('#colors').value,
      "size": res.querySelector('#size').value,
      "quantity": res.querySelector('#quantity').value
    };
    articles.push(article);
  });
  return articles;
};

function checkPersonalInfo() {
  var userInfo = {
    "name": $('#name').value,
    "email": $('#email').value,
    "address": $('#address').value,
    "postal": $('#postal').value,
    "cardNumber": $('#cardNumber').value,
    "date": $('#date').value,
    "cvv": $('#cvv').value
  };

  for (var _i = 0, _Object$entries = Object.entries(userInfo); _i < _Object$entries.length; _i++) {
    var _Object$entries$_i = _slicedToArray(_Object$entries[_i], 2),
        key = _Object$entries$_i[0],
        value = _Object$entries$_i[1];

    if (value === "") {
      displayAlert("Please fill all field");
      return false;
    }
  }

  return userInfo;
}

/***/ }),

/***/ 4:
/*!**************************************!*\
  !*** multi ./resources/js/basket.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\wamp64\www\Projects\sneakerx\resources\js\basket.js */"./resources/js/basket.js");


/***/ })

/******/ });