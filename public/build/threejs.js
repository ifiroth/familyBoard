"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["threejs"],{

/***/ "./assets/js/three.js":
/*!****************************!*\
  !*** ./assets/js/three.js ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.iterator.js */ "./node_modules/core-js/modules/es.array.iterator.js");
/* harmony import */ var core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_iterator_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_array_buffer_slice_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.array-buffer.slice.js */ "./node_modules/core-js/modules/es.array-buffer.slice.js");
/* harmony import */ var core_js_modules_es_array_buffer_slice_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_buffer_slice_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_typed_array_float32_array_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.typed-array.float32-array.js */ "./node_modules/core-js/modules/es.typed-array.float32-array.js");
/* harmony import */ var core_js_modules_es_typed_array_float32_array_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_float32_array_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_typed_array_at_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.typed-array.at.js */ "./node_modules/core-js/modules/es.typed-array.at.js");
/* harmony import */ var core_js_modules_es_typed_array_at_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_at_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_typed_array_copy_within_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.typed-array.copy-within.js */ "./node_modules/core-js/modules/es.typed-array.copy-within.js");
/* harmony import */ var core_js_modules_es_typed_array_copy_within_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_copy_within_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_typed_array_every_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.typed-array.every.js */ "./node_modules/core-js/modules/es.typed-array.every.js");
/* harmony import */ var core_js_modules_es_typed_array_every_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_every_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_typed_array_fill_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.typed-array.fill.js */ "./node_modules/core-js/modules/es.typed-array.fill.js");
/* harmony import */ var core_js_modules_es_typed_array_fill_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_fill_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_es_typed_array_filter_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/es.typed-array.filter.js */ "./node_modules/core-js/modules/es.typed-array.filter.js");
/* harmony import */ var core_js_modules_es_typed_array_filter_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_filter_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_es_typed_array_find_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/es.typed-array.find.js */ "./node_modules/core-js/modules/es.typed-array.find.js");
/* harmony import */ var core_js_modules_es_typed_array_find_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_find_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_es_typed_array_find_index_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/es.typed-array.find-index.js */ "./node_modules/core-js/modules/es.typed-array.find-index.js");
/* harmony import */ var core_js_modules_es_typed_array_find_index_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_find_index_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var core_js_modules_es_typed_array_find_last_js__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! core-js/modules/es.typed-array.find-last.js */ "./node_modules/core-js/modules/es.typed-array.find-last.js");
/* harmony import */ var core_js_modules_es_typed_array_find_last_js__WEBPACK_IMPORTED_MODULE_11___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_find_last_js__WEBPACK_IMPORTED_MODULE_11__);
/* harmony import */ var core_js_modules_es_typed_array_find_last_index_js__WEBPACK_IMPORTED_MODULE_12__ = __webpack_require__(/*! core-js/modules/es.typed-array.find-last-index.js */ "./node_modules/core-js/modules/es.typed-array.find-last-index.js");
/* harmony import */ var core_js_modules_es_typed_array_find_last_index_js__WEBPACK_IMPORTED_MODULE_12___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_find_last_index_js__WEBPACK_IMPORTED_MODULE_12__);
/* harmony import */ var core_js_modules_es_typed_array_for_each_js__WEBPACK_IMPORTED_MODULE_13__ = __webpack_require__(/*! core-js/modules/es.typed-array.for-each.js */ "./node_modules/core-js/modules/es.typed-array.for-each.js");
/* harmony import */ var core_js_modules_es_typed_array_for_each_js__WEBPACK_IMPORTED_MODULE_13___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_for_each_js__WEBPACK_IMPORTED_MODULE_13__);
/* harmony import */ var core_js_modules_es_typed_array_includes_js__WEBPACK_IMPORTED_MODULE_14__ = __webpack_require__(/*! core-js/modules/es.typed-array.includes.js */ "./node_modules/core-js/modules/es.typed-array.includes.js");
/* harmony import */ var core_js_modules_es_typed_array_includes_js__WEBPACK_IMPORTED_MODULE_14___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_includes_js__WEBPACK_IMPORTED_MODULE_14__);
/* harmony import */ var core_js_modules_es_typed_array_index_of_js__WEBPACK_IMPORTED_MODULE_15__ = __webpack_require__(/*! core-js/modules/es.typed-array.index-of.js */ "./node_modules/core-js/modules/es.typed-array.index-of.js");
/* harmony import */ var core_js_modules_es_typed_array_index_of_js__WEBPACK_IMPORTED_MODULE_15___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_index_of_js__WEBPACK_IMPORTED_MODULE_15__);
/* harmony import */ var core_js_modules_es_typed_array_iterator_js__WEBPACK_IMPORTED_MODULE_16__ = __webpack_require__(/*! core-js/modules/es.typed-array.iterator.js */ "./node_modules/core-js/modules/es.typed-array.iterator.js");
/* harmony import */ var core_js_modules_es_typed_array_iterator_js__WEBPACK_IMPORTED_MODULE_16___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_iterator_js__WEBPACK_IMPORTED_MODULE_16__);
/* harmony import */ var core_js_modules_es_typed_array_join_js__WEBPACK_IMPORTED_MODULE_17__ = __webpack_require__(/*! core-js/modules/es.typed-array.join.js */ "./node_modules/core-js/modules/es.typed-array.join.js");
/* harmony import */ var core_js_modules_es_typed_array_join_js__WEBPACK_IMPORTED_MODULE_17___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_join_js__WEBPACK_IMPORTED_MODULE_17__);
/* harmony import */ var core_js_modules_es_typed_array_last_index_of_js__WEBPACK_IMPORTED_MODULE_18__ = __webpack_require__(/*! core-js/modules/es.typed-array.last-index-of.js */ "./node_modules/core-js/modules/es.typed-array.last-index-of.js");
/* harmony import */ var core_js_modules_es_typed_array_last_index_of_js__WEBPACK_IMPORTED_MODULE_18___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_last_index_of_js__WEBPACK_IMPORTED_MODULE_18__);
/* harmony import */ var core_js_modules_es_typed_array_map_js__WEBPACK_IMPORTED_MODULE_19__ = __webpack_require__(/*! core-js/modules/es.typed-array.map.js */ "./node_modules/core-js/modules/es.typed-array.map.js");
/* harmony import */ var core_js_modules_es_typed_array_map_js__WEBPACK_IMPORTED_MODULE_19___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_map_js__WEBPACK_IMPORTED_MODULE_19__);
/* harmony import */ var core_js_modules_es_typed_array_reduce_js__WEBPACK_IMPORTED_MODULE_20__ = __webpack_require__(/*! core-js/modules/es.typed-array.reduce.js */ "./node_modules/core-js/modules/es.typed-array.reduce.js");
/* harmony import */ var core_js_modules_es_typed_array_reduce_js__WEBPACK_IMPORTED_MODULE_20___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_reduce_js__WEBPACK_IMPORTED_MODULE_20__);
/* harmony import */ var core_js_modules_es_typed_array_reduce_right_js__WEBPACK_IMPORTED_MODULE_21__ = __webpack_require__(/*! core-js/modules/es.typed-array.reduce-right.js */ "./node_modules/core-js/modules/es.typed-array.reduce-right.js");
/* harmony import */ var core_js_modules_es_typed_array_reduce_right_js__WEBPACK_IMPORTED_MODULE_21___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_reduce_right_js__WEBPACK_IMPORTED_MODULE_21__);
/* harmony import */ var core_js_modules_es_typed_array_reverse_js__WEBPACK_IMPORTED_MODULE_22__ = __webpack_require__(/*! core-js/modules/es.typed-array.reverse.js */ "./node_modules/core-js/modules/es.typed-array.reverse.js");
/* harmony import */ var core_js_modules_es_typed_array_reverse_js__WEBPACK_IMPORTED_MODULE_22___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_reverse_js__WEBPACK_IMPORTED_MODULE_22__);
/* harmony import */ var core_js_modules_es_typed_array_set_js__WEBPACK_IMPORTED_MODULE_23__ = __webpack_require__(/*! core-js/modules/es.typed-array.set.js */ "./node_modules/core-js/modules/es.typed-array.set.js");
/* harmony import */ var core_js_modules_es_typed_array_set_js__WEBPACK_IMPORTED_MODULE_23___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_set_js__WEBPACK_IMPORTED_MODULE_23__);
/* harmony import */ var core_js_modules_es_typed_array_slice_js__WEBPACK_IMPORTED_MODULE_24__ = __webpack_require__(/*! core-js/modules/es.typed-array.slice.js */ "./node_modules/core-js/modules/es.typed-array.slice.js");
/* harmony import */ var core_js_modules_es_typed_array_slice_js__WEBPACK_IMPORTED_MODULE_24___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_slice_js__WEBPACK_IMPORTED_MODULE_24__);
/* harmony import */ var core_js_modules_es_typed_array_some_js__WEBPACK_IMPORTED_MODULE_25__ = __webpack_require__(/*! core-js/modules/es.typed-array.some.js */ "./node_modules/core-js/modules/es.typed-array.some.js");
/* harmony import */ var core_js_modules_es_typed_array_some_js__WEBPACK_IMPORTED_MODULE_25___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_some_js__WEBPACK_IMPORTED_MODULE_25__);
/* harmony import */ var core_js_modules_es_typed_array_sort_js__WEBPACK_IMPORTED_MODULE_26__ = __webpack_require__(/*! core-js/modules/es.typed-array.sort.js */ "./node_modules/core-js/modules/es.typed-array.sort.js");
/* harmony import */ var core_js_modules_es_typed_array_sort_js__WEBPACK_IMPORTED_MODULE_26___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_sort_js__WEBPACK_IMPORTED_MODULE_26__);
/* harmony import */ var core_js_modules_es_typed_array_subarray_js__WEBPACK_IMPORTED_MODULE_27__ = __webpack_require__(/*! core-js/modules/es.typed-array.subarray.js */ "./node_modules/core-js/modules/es.typed-array.subarray.js");
/* harmony import */ var core_js_modules_es_typed_array_subarray_js__WEBPACK_IMPORTED_MODULE_27___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_subarray_js__WEBPACK_IMPORTED_MODULE_27__);
/* harmony import */ var core_js_modules_es_typed_array_to_locale_string_js__WEBPACK_IMPORTED_MODULE_28__ = __webpack_require__(/*! core-js/modules/es.typed-array.to-locale-string.js */ "./node_modules/core-js/modules/es.typed-array.to-locale-string.js");
/* harmony import */ var core_js_modules_es_typed_array_to_locale_string_js__WEBPACK_IMPORTED_MODULE_28___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_to_locale_string_js__WEBPACK_IMPORTED_MODULE_28__);
/* harmony import */ var core_js_modules_es_typed_array_to_string_js__WEBPACK_IMPORTED_MODULE_29__ = __webpack_require__(/*! core-js/modules/es.typed-array.to-string.js */ "./node_modules/core-js/modules/es.typed-array.to-string.js");
/* harmony import */ var core_js_modules_es_typed_array_to_string_js__WEBPACK_IMPORTED_MODULE_29___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_typed_array_to_string_js__WEBPACK_IMPORTED_MODULE_29__);
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_30__ = __webpack_require__(/*! core-js/modules/es.array.concat.js */ "./node_modules/core-js/modules/es.array.concat.js");
/* harmony import */ var core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_30___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_concat_js__WEBPACK_IMPORTED_MODULE_30__);
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_31__ = __webpack_require__(/*! core-js/modules/es.array.is-array.js */ "./node_modules/core-js/modules/es.array.is-array.js");
/* harmony import */ var core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_31___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_is_array_js__WEBPACK_IMPORTED_MODULE_31__);
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_32__ = __webpack_require__(/*! core-js/modules/es.symbol.js */ "./node_modules/core-js/modules/es.symbol.js");
/* harmony import */ var core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_32___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_js__WEBPACK_IMPORTED_MODULE_32__);
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_33__ = __webpack_require__(/*! core-js/modules/es.symbol.description.js */ "./node_modules/core-js/modules/es.symbol.description.js");
/* harmony import */ var core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_33___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_description_js__WEBPACK_IMPORTED_MODULE_33__);
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_34__ = __webpack_require__(/*! core-js/modules/es.symbol.iterator.js */ "./node_modules/core-js/modules/es.symbol.iterator.js");
/* harmony import */ var core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_34___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_symbol_iterator_js__WEBPACK_IMPORTED_MODULE_34__);
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_35__ = __webpack_require__(/*! core-js/modules/es.string.iterator.js */ "./node_modules/core-js/modules/es.string.iterator.js");
/* harmony import */ var core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_35___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_iterator_js__WEBPACK_IMPORTED_MODULE_35__);
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_36__ = __webpack_require__(/*! core-js/modules/web.dom-collections.iterator.js */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");
/* harmony import */ var core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_36___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_iterator_js__WEBPACK_IMPORTED_MODULE_36__);
/* harmony import */ var core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_37__ = __webpack_require__(/*! core-js/modules/es.array.from.js */ "./node_modules/core-js/modules/es.array.from.js");
/* harmony import */ var core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_37___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_from_js__WEBPACK_IMPORTED_MODULE_37__);
/* harmony import */ var core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_38__ = __webpack_require__(/*! core-js/modules/es.array.slice.js */ "./node_modules/core-js/modules/es.array.slice.js");
/* harmony import */ var core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_38___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_slice_js__WEBPACK_IMPORTED_MODULE_38__);
/* harmony import */ var core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_39__ = __webpack_require__(/*! core-js/modules/es.function.name.js */ "./node_modules/core-js/modules/es.function.name.js");
/* harmony import */ var core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_39___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_39__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_40__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_40___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_40__);
/* harmony import */ var core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_41__ = __webpack_require__(/*! core-js/modules/es.regexp.test.js */ "./node_modules/core-js/modules/es.regexp.test.js");
/* harmony import */ var core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_41___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_41__);
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_42__ = __webpack_require__(/*! core-js/modules/es.error.cause.js */ "./node_modules/core-js/modules/es.error.cause.js");
/* harmony import */ var core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_42___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_cause_js__WEBPACK_IMPORTED_MODULE_42__);
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_43__ = __webpack_require__(/*! core-js/modules/es.error.to-string.js */ "./node_modules/core-js/modules/es.error.to-string.js");
/* harmony import */ var core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_43___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_error_to_string_js__WEBPACK_IMPORTED_MODULE_43__);
/* harmony import */ var three__WEBPACK_IMPORTED_MODULE_45__ = __webpack_require__(/*! three */ "./node_modules/three/build/three.module.js");
/* harmony import */ var three_examples_jsm_controls_OrbitControls_js__WEBPACK_IMPORTED_MODULE_46__ = __webpack_require__(/*! three/examples/jsm/controls/OrbitControls.js */ "./node_modules/three/examples/jsm/controls/OrbitControls.js");
/* harmony import */ var dat_gui__WEBPACK_IMPORTED_MODULE_44__ = __webpack_require__(/*! dat.gui */ "./node_modules/dat.gui/build/dat.gui.module.js");
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

















































var canvas = document.querySelector('#webgl'); // SCENE

var scene = new three__WEBPACK_IMPORTED_MODULE_45__.Scene(); // Objects

/*
const positionsArray = new Float32Array([
    0, 0, 0,
    0, 1, 0,
    1, 0, 0,
])

const positionsAttribute = new THREE.BufferAttribute(positionsArray, 3)


const coffin = new THREE.BufferGeometry()
coffin.setAttribute('position', positionsAttribute)

const material = new THREE.MeshBasicMaterial({
    color: 0xff0000,
    wireframe: true,
})
const mesh = new THREE.Mesh(coffin, material)
scene.add(mesh)
*/

var v = {
  a1: [0, 0, 2],
  a2: [8, 0, 3],
  a3: [11, 0, 2],
  a4: [11, 0, 0],
  a5: [8, 0, -1],
  a6: [0, 0, 0],
  b1: [-.5, 2.5, 3],
  b2: [8, 2.5, 4],
  b3: [11.5, 2.5, 3],
  b4: [11.5, 2.5, -1],
  b5: [8, 2.5, -2],
  b6: [-.5, 2.5, -1],
  c1: [0, 4, 2],
  c2: [8, 4, 3],
  c3: [11, 4, 2],
  c4: [11, 4, 0],
  c5: [8, 4, -1],
  c6: [0, 4, 0]
};
var geometry = new three__WEBPACK_IMPORTED_MODULE_45__.BufferGeometry();
var vertices = new Float32Array([].concat(_toConsumableArray(v.a6), _toConsumableArray(v.a5), _toConsumableArray(v.a2), _toConsumableArray(v.a6), _toConsumableArray(v.a2), _toConsumableArray(v.a1), _toConsumableArray(v.a3), _toConsumableArray(v.a2), _toConsumableArray(v.a5), _toConsumableArray(v.a3), _toConsumableArray(v.a5), _toConsumableArray(v.a4), _toConsumableArray(v.c6), _toConsumableArray(v.c2), _toConsumableArray(v.c5), _toConsumableArray(v.c6), _toConsumableArray(v.c1), _toConsumableArray(v.c2), _toConsumableArray(v.c3), _toConsumableArray(v.c5), _toConsumableArray(v.c2), _toConsumableArray(v.c3), _toConsumableArray(v.c4), _toConsumableArray(v.c5), _toConsumableArray(v.a6), _toConsumableArray(v.a1), _toConsumableArray(v.b6), _toConsumableArray(v.a1), _toConsumableArray(v.b1), _toConsumableArray(v.b6), _toConsumableArray(v.c1), _toConsumableArray(v.b6), _toConsumableArray(v.b1), _toConsumableArray(v.c1), _toConsumableArray(v.c6), _toConsumableArray(v.b6), _toConsumableArray(v.a4), _toConsumableArray(v.b4), _toConsumableArray(v.a3), _toConsumableArray(v.a3), _toConsumableArray(v.b4), _toConsumableArray(v.b3), _toConsumableArray(v.c3), _toConsumableArray(v.b3), _toConsumableArray(v.b4), _toConsumableArray(v.c3), _toConsumableArray(v.b4), _toConsumableArray(v.c4), _toConsumableArray(v.a6), _toConsumableArray(v.b6), _toConsumableArray(v.a5), _toConsumableArray(v.b5), _toConsumableArray(v.a5), _toConsumableArray(v.b6), _toConsumableArray(v.b5), _toConsumableArray(v.b4), _toConsumableArray(v.a5), _toConsumableArray(v.a4), _toConsumableArray(v.a5), _toConsumableArray(v.b4), _toConsumableArray(v.c6), _toConsumableArray(v.c5), _toConsumableArray(v.b6), _toConsumableArray(v.b5), _toConsumableArray(v.b6), _toConsumableArray(v.c5), _toConsumableArray(v.b5), _toConsumableArray(v.c5), _toConsumableArray(v.b4), _toConsumableArray(v.b4), _toConsumableArray(v.c5), _toConsumableArray(v.c4), _toConsumableArray(v.a1), _toConsumableArray(v.a2), _toConsumableArray(v.b1), _toConsumableArray(v.b2), _toConsumableArray(v.b1), _toConsumableArray(v.a2), _toConsumableArray(v.b2), _toConsumableArray(v.a2), _toConsumableArray(v.b3), _toConsumableArray(v.a3), _toConsumableArray(v.b3), _toConsumableArray(v.a2), _toConsumableArray(v.c1), _toConsumableArray(v.b1), _toConsumableArray(v.c2), _toConsumableArray(v.b2), _toConsumableArray(v.c2), _toConsumableArray(v.b1), _toConsumableArray(v.b2), _toConsumableArray(v.b3), _toConsumableArray(v.c2), _toConsumableArray(v.c3), _toConsumableArray(v.c2), _toConsumableArray(v.b3)));
geometry.setAttribute('position', new three__WEBPACK_IMPORTED_MODULE_45__.BufferAttribute(vertices, 3));
var parameters = {
  color: 0xff0000
};
var material = new three__WEBPACK_IMPORTED_MODULE_45__.MeshBasicMaterial({
  color: parameters.color,
  wireframe: false
});
var mesh = new three__WEBPACK_IMPORTED_MODULE_45__.Mesh(geometry, material);
scene.add(mesh); // Sizes

var sizes = {
  width: 800,
  height: 600
}; // Camera

var camera = new three__WEBPACK_IMPORTED_MODULE_45__.PerspectiveCamera(75, sizes.width / sizes.height);
camera.position.set(-5, 5, 5);
scene.add(camera);
var ambientLight = new three__WEBPACK_IMPORTED_MODULE_45__.AmbientLight(0xffffff, 0.5);
scene.add(ambientLight); // Renderer

var renderer = new three__WEBPACK_IMPORTED_MODULE_45__.WebGLRenderer({
  canvas: canvas
}); // GUI

var gui = new dat_gui__WEBPACK_IMPORTED_MODULE_44__.GUI();
gui.add(camera.position, 'x').min(-3).max(3).step(.2);
gui.add(camera.position, 'y').min(-3).max(3).step(.2);
gui.add(camera.position, 'z').min(-3).max(3).step(.2);
gui.add(material, 'wireframe');
gui.addColor(parameters, 'color').onChange(function () {
  material.color.set(parameters.color);
});
gui.add(ambientLight, 'intensity').min(0).max(1).step(0.001);
var directionalLight = new three__WEBPACK_IMPORTED_MODULE_45__.DirectionalLight(0x00fffc, 0.63);
scene.add(directionalLight);
renderer.setSize(sizes.width, sizes.height); // Time

var clock = new three__WEBPACK_IMPORTED_MODULE_45__.Clock(); // Controls

var controls = new three_examples_jsm_controls_OrbitControls_js__WEBPACK_IMPORTED_MODULE_46__.OrbitControls(camera, canvas);
controls.enableDamping = true; // Animations

var tick = function tick() {
  var elapsedTime = clock.getElapsedTime();
  controls.update();
  mesh.rotateY(.001);
  renderer.render(scene, camera);
  window.requestAnimationFrame(tick);
};

tick();

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_internals_add-to-unscopables_js-node_modules_core-js_internals_a-dd2802","vendors-node_modules_core-js_internals_a-constructor_js-node_modules_core-js_internals_array--797d7f","vendors-node_modules_core-js_modules_es_array-buffer_slice_js-node_modules_core-js_modules_es-b49f3a"], () => (__webpack_exec__("./assets/js/three.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QUF0RDtBQUVBLElBQU1HLGdCQUFnQixHQUFHLElBQUk1RCxvREFBSixDQUEyQixRQUEzQixFQUFxQyxJQUFyQyxDQUF6QjtBQUNBTyxLQUFLLENBQUNrQyxHQUFOLENBQVVtQixnQkFBVjtBQUVBVCxRQUFRLENBQUNXLE9BQVQsQ0FBaUJwQixLQUFLLENBQUNDLEtBQXZCLEVBQThCRCxLQUFLLENBQUNFLE1BQXBDLEdBRUE7O0FBQ0EsSUFBTW1CLEtBQUssR0FBRyxJQUFJL0QseUNBQUosRUFBZCxFQUVBOztBQUVBLElBQU1pRSxRQUFRLEdBQUcsSUFBSWhFLHdGQUFKLENBQWtCNEMsTUFBbEIsRUFBMEJ6QyxNQUExQixDQUFqQjtBQUNBNkQsUUFBUSxDQUFDQyxhQUFULEdBQXlCLElBQXpCLEVBRUE7O0FBQ0EsSUFBTUMsSUFBSSxHQUFHLFNBQVBBLElBQU8sR0FBTTtFQUVmLElBQU1DLFdBQVcsR0FBR0wsS0FBSyxDQUFDTSxjQUFOLEVBQXBCO0VBRUFKLFFBQVEsQ0FBQ0ssTUFBVDtFQUNBL0IsSUFBSSxDQUFDZ0MsT0FBTCxDQUFhLElBQWI7RUFFQXBCLFFBQVEsQ0FBQ3FCLE1BQVQsQ0FBZ0JqRSxLQUFoQixFQUF1QnNDLE1BQXZCO0VBRUE0QixNQUFNLENBQUNDLHFCQUFQLENBQTZCUCxJQUE3QjtBQUNILENBVkQ7O0FBWUFBLElBQUkiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvdGhyZWUuanMiXSwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0ICogYXMgVEhSRUUgZnJvbSBcInRocmVlXCJcbmltcG9ydCB7IE9yYml0Q29udHJvbHMgfSBmcm9tIFwidGhyZWUvZXhhbXBsZXMvanNtL2NvbnRyb2xzL09yYml0Q29udHJvbHMuanNcIlxuaW1wb3J0ICogYXMgZGF0IGZyb20gJ2RhdC5ndWknXG5pbXBvcnQgZ3NhcCBmcm9tICdnc2FwJ1xuXG5jb25zdCBjYW52YXMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcjd2ViZ2wnKVxuXG4vLyBTQ0VORVxuXG5jb25zdCBzY2VuZSA9IG5ldyBUSFJFRS5TY2VuZSgpXG5cbi8vIE9iamVjdHNcblxuLypcbmNvbnN0IHBvc2l0aW9uc0FycmF5ID0gbmV3IEZsb2F0MzJBcnJheShbXG4gICAgMCwgMCwgMCxcbiAgICAwLCAxLCAwLFxuICAgIDEsIDAsIDAsXG5dKVxuXG5jb25zdCBwb3NpdGlvbnNBdHRyaWJ1dGUgPSBuZXcgVEhSRUUuQnVmZmVyQXR0cmlidXRlKHBvc2l0aW9uc0FycmF5LCAzKVxuXG5cbmNvbnN0IGNvZmZpbiA9IG5ldyBUSFJFRS5CdWZmZXJHZW9tZXRyeSgpXG5jb2ZmaW4uc2V0QXR0cmlidXRlKCdwb3NpdGlvbicsIHBvc2l0aW9uc0F0dHJpYnV0ZSlcblxuY29uc3QgbWF0ZXJpYWwgPSBuZXcgVEhSRUUuTWVzaEJhc2ljTWF0ZXJpYWwoe1xuICAgIGNvbG9yOiAweGZmMDAwMCxcbiAgICB3aXJlZnJhbWU6IHRydWUsXG59KVxuY29uc3QgbWVzaCA9IG5ldyBUSFJFRS5NZXNoKGNvZmZpbiwgbWF0ZXJpYWwpXG5zY2VuZS5hZGQobWVzaClcbiovXG5cbmNvbnN0IHYgPSB7XG4gICAgYTE6IFswLCAwLCAyXSxcbiAgICBhMjogWzgsIDAsIDNdLFxuICAgIGEzOiBbMTEsIDAsIDJdLFxuICAgIGE0OiBbMTEsIDAsIDBdLFxuICAgIGE1OiBbOCwgMCwgLTFdLFxuICAgIGE2OiBbMCwgMCwgMF0sXG4gICAgYjE6IFstLjUsIDIuNSwgM10sXG4gICAgYjI6IFs4LCAyLjUsIDRdLFxuICAgIGIzOiBbMTEuNSwgMi41LCAzXSxcbiAgICBiNDogWzExLjUsIDIuNSwgLTFdLFxuICAgIGI1OiBbOCwgMi41LCAtMl0sXG4gICAgYjY6IFstLjUsIDIuNSwgLTFdLFxuICAgIGMxOiBbMCwgNCwgMl0sXG4gICAgYzI6IFs4LCA0LCAzXSxcbiAgICBjMzogWzExLCA0LCAyXSxcbiAgICBjNDogWzExLCA0LCAwXSxcbiAgICBjNTogWzgsIDQsIC0xXSxcbiAgICBjNjogWzAsIDQsIDBdLFxufVxuXG5cbmNvbnN0IGdlb21ldHJ5ID0gbmV3IFRIUkVFLkJ1ZmZlckdlb21ldHJ5KClcbmNvbnN0IHZlcnRpY2VzID0gbmV3IEZsb2F0MzJBcnJheShbXG4gICAgLy8gQkFTRSBZID0gMFxuICAgIC4uLnYuYTYsICAgIC4uLnYuYTUsICAgIC4uLnYuYTIsXG4gICAgLi4udi5hNiwgICAgLi4udi5hMiwgICAgLi4udi5hMSxcbiAgICAuLi52LmEzLCAgICAuLi52LmEyLCAgICAuLi52LmE1LFxuICAgIC4uLnYuYTMsICAgIC4uLnYuYTUsICAgIC4uLnYuYTQsXG5cbiAgICAvLyBUT1AgWSA9IDRcbiAgICAuLi52LmM2LCAgICAuLi52LmMyLCAgICAuLi52LmM1LFxuICAgIC4uLnYuYzYsICAgIC4uLnYuYzEsICAgIC4uLnYuYzIsXG4gICAgLi4udi5jMywgICAgLi4udi5jNSwgICAgLi4udi5jMixcbiAgICAuLi52LmMzLCAgICAuLi52LmM0LCAgICAuLi52LmM1LFxuXG4gICAgLy8gRkFDRSBGUk9OVFxuICAgIC4uLnYuYTYsIC4uLnYuYTEsIC4uLnYuYjYsXG4gICAgLi4udi5hMSwgLi4udi5iMSwgLi4udi5iNixcbiAgICAuLi52LmMxLCAuLi52LmI2LCAuLi52LmIxLFxuICAgIC4uLnYuYzEsIC4uLnYuYzYsIC4uLnYuYjYsXG5cbiAgICAvLyBGQUNFIEJBQ0tcbiAgICAuLi52LmE0LCAuLi52LmI0LCAuLi52LmEzLFxuICAgIC4uLnYuYTMsIC4uLnYuYjQsIC4uLnYuYjMsXG4gICAgLi4udi5jMywgLi4udi5iMywgLi4udi5iNCxcbiAgICAuLi52LmMzLCAuLi52LmI0LCAuLi52LmM0LFxuXG4gICAgLy8gRkFDRSBMRUZUIDEgKyAyXG4gICAgLi4udi5hNiwgLi4udi5iNiwgLi4udi5hNSxcbiAgICAuLi52LmI1LCAuLi52LmE1LCAuLi52LmI2LFxuICAgIC4uLnYuYjUsIC4uLnYuYjQsIC4uLnYuYTUsXG4gICAgLi4udi5hNCwgLi4udi5hNSwgLi4udi5iNCxcblxuICAgIC4uLnYuYzYsIC4uLnYuYzUsIC4uLnYuYjYsXG4gICAgLi4udi5iNSwgLi4udi5iNiwgLi4udi5jNSxcbiAgICAuLi52LmI1LCAuLi52LmM1LCAuLi52LmI0LFxuICAgIC4uLnYuYjQsICAuLi52LmM1LC4uLnYuYzQsXG5cbiAgICAvLyBGQUNFIFJJR0hUIDEgKyAyXG4gICAgLi4udi5hMSwgLi4udi5hMiwgLi4udi5iMSxcbiAgICAuLi52LmIyLCAuLi52LmIxLCAuLi52LmEyLFxuICAgIC4uLnYuYjIsIC4uLnYuYTIsIC4uLnYuYjMsXG4gICAgLi4udi5hMywgLi4udi5iMywgLi4udi5hMixcblxuICAgIC4uLnYuYzEsIC4uLnYuYjEsIC4uLnYuYzIsXG4gICAgLi4udi5iMiwgLi4udi5jMiwgLi4udi5iMSxcbiAgICAuLi52LmIyLCAuLi52LmIzLCAuLi52LmMyLFxuICAgIC4uLnYuYzMsIC4uLnYuYzIsIC4uLnYuYjMsXG5dKVxuXG5nZW9tZXRyeS5zZXRBdHRyaWJ1dGUoJ3Bvc2l0aW9uJywgbmV3IFRIUkVFLkJ1ZmZlckF0dHJpYnV0ZSh2ZXJ0aWNlcywgMykpXG5cbmNvbnN0IHBhcmFtZXRlcnMgPSB7XG4gICAgY29sb3I6IDB4ZmYwMDAwLFxufVxuXG5jb25zdCBtYXRlcmlhbCA9IG5ldyBUSFJFRS5NZXNoQmFzaWNNYXRlcmlhbCh7XG4gICAgY29sb3I6IHBhcmFtZXRlcnMuY29sb3IsXG4gICAgd2lyZWZyYW1lOiBmYWxzZSxcbn0pXG5cbmNvbnN0IG1lc2ggPSBuZXcgVEhSRUUuTWVzaChnZW9tZXRyeSwgbWF0ZXJpYWwpXG5cbnNjZW5lLmFkZChtZXNoKVxuXG4vLyBTaXplc1xuY29uc3Qgc2l6ZXMgPSB7XG4gICAgd2lkdGg6IDgwMCxcbiAgICBoZWlnaHQ6IDYwMCxcbn1cblxuLy8gQ2FtZXJhXG5cbmNvbnN0IGNhbWVyYSA9IG5ldyBUSFJFRS5QZXJzcGVjdGl2ZUNhbWVyYSg3NSwgc2l6ZXMud2lkdGggLyBzaXplcy5oZWlnaHQpXG5cbmNhbWVyYS5wb3NpdGlvbi5zZXQoLTUsIDUsIDUpXG5zY2VuZS5hZGQoY2FtZXJhKVxuXG5jb25zdCBhbWJpZW50TGlnaHQgPSBuZXcgVEhSRUUuQW1iaWVudExpZ2h0KDB4ZmZmZmZmLCAwLjUpXG5zY2VuZS5hZGQoYW1iaWVudExpZ2h0KVxuXG4vLyBSZW5kZXJlclxuXG5jb25zdCByZW5kZXJlciA9IG5ldyBUSFJFRS5XZWJHTFJlbmRlcmVyKHtcbiAgICBjYW52YXNcbn0pXG5cbi8vIEdVSVxuXG5jb25zdCBndWkgPSBuZXcgZGF0LkdVSSgpXG5ndWkuYWRkKGNhbWVyYS5wb3NpdGlvbiwgJ3gnKVxuICAgIC5taW4oLTMpXG4gICAgLm1heCgzKVxuICAgIC5zdGVwKC4yKVxuZ3VpLmFkZChjYW1lcmEucG9zaXRpb24sICd5JylcbiAgICAubWluKC0zKVxuICAgIC5tYXgoMylcbiAgICAuc3RlcCguMilcbmd1aS5hZGQoY2FtZXJhLnBvc2l0aW9uLCAneicpXG4gICAgLm1pbigtMylcbiAgICAubWF4KDMpXG4gICAgLnN0ZXAoLjIpXG5ndWkuYWRkKG1hdGVyaWFsLCAnd2lyZWZyYW1lJylcbmd1aS5hZGRDb2xvcihwYXJhbWV0ZXJzLCAnY29sb3InKVxuICAgIC5vbkNoYW5nZSgoKSA9PiB7XG4gICAgICAgIG1hdGVyaWFsLmNvbG9yLnNldChwYXJhbWV0ZXJzLmNvbG9yKVxuICAgIH0pXG5ndWkuYWRkKGFtYmllbnRMaWdodCwgJ2ludGVuc2l0eScpLm1pbigwKS5tYXgoMSkuc3RlcCgwLjAwMSlcblxuY29uc3QgZGlyZWN0aW9uYWxMaWdodCA9IG5ldyBUSFJFRS5EaXJlY3Rpb25hbExpZ2h0KDB4MDBmZmZjLCAwLjYzKVxuc2NlbmUuYWRkKGRpcmVjdGlvbmFsTGlnaHQpXG5cbnJlbmRlcmVyLnNldFNpemUoc2l6ZXMud2lkdGgsIHNpemVzLmhlaWdodClcblxuLy8gVGltZVxuY29uc3QgY2xvY2sgPSBuZXcgVEhSRUUuQ2xvY2soKVxuXG4vLyBDb250cm9sc1xuXG5jb25zdCBjb250cm9scyA9IG5ldyBPcmJpdENvbnRyb2xzKGNhbWVyYSwgY2FudmFzKVxuY29udHJvbHMuZW5hYmxlRGFtcGluZyA9IHRydWVcblxuLy8gQW5pbWF0aW9uc1xuY29uc3QgdGljayA9ICgpID0+IHtcblxuICAgIGNvbnN0IGVsYXBzZWRUaW1lID0gY2xvY2suZ2V0RWxhcHNlZFRpbWUoKVxuXG4gICAgY29udHJvbHMudXBkYXRlKClcbiAgICBtZXNoLnJvdGF0ZVkoLjAwMSlcblxuICAgIHJlbmRlcmVyLnJlbmRlcihzY2VuZSwgY2FtZXJhKVxuXG4gICAgd2luZG93LnJlcXVlc3RBbmltYXRpb25GcmFtZSh0aWNrKVxufVxuXG50aWNrKClcbiJdLCJuYW1lcyI6WyJUSFJFRSIsIk9yYml0Q29udHJvbHMiLCJkYXQiLCJnc2FwIiwiY2FudmFzIiwiZG9jdW1lbnQiLCJxdWVyeVNlbGVjdG9yIiwic2NlbmUiLCJTY2VuZSIsInYiLCJhMSIsImEyIiwiYTMiLCJhNCIsImE1IiwiYTYiLCJiMSIsImIyIiwiYjMiLCJiNCIsImI1IiwiYjYiLCJjMSIsImMyIiwiYzMiLCJjNCIsImM1IiwiYzYiLCJnZW9tZXRyeSIsIkJ1ZmZlckdlb21ldHJ5IiwidmVydGljZXMiLCJGbG9hdDMyQXJyYXkiLCJzZXRBdHRyaWJ1dGUiLCJCdWZmZXJBdHRyaWJ1dGUiLCJwYXJhbWV0ZXJzIiwiY29sb3IiLCJtYXRlcmlhbCIsIk1lc2hCYXNpY01hdGVyaWFsIiwid2lyZWZyYW1lIiwibWVzaCIsIk1lc2giLCJhZGQiLCJzaXplcyIsIndpZHRoIiwiaGVpZ2h0IiwiY2FtZXJhIiwiUGVyc3BlY3RpdmVDYW1lcmEiLCJwb3NpdGlvbiIsInNldCIsImFtYmllbnRMaWdodCIsIkFtYmllbnRMaWdodCIsInJlbmRlcmVyIiwiV2ViR0xSZW5kZXJlciIsImd1aSIsIkdVSSIsIm1pbiIsIm1heCIsInN0ZXAiLCJhZGRDb2xvciIsIm9uQ2hhbmdlIiwiZGlyZWN0aW9uYWxMaWdodCIsIkRpcmVjdGlvbmFsTGlnaHQiLCJzZXRTaXplIiwiY2xvY2siLCJDbG9jayIsImNvbnRyb2xzIiwiZW5hYmxlRGFtcGluZyIsInRpY2siLCJlbGFwc2VkVGltZSIsImdldEVsYXBzZWRUaW1lIiwidXBkYXRlIiwicm90YXRlWSIsInJlbmRlciIsIndpbmRvdyIsInJlcXVlc3RBbmltYXRpb25GcmFtZSJdLCJzb3VyY2VSb290IjoiIn0=