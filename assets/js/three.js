import * as THREE from "three"
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls.js"
import * as dat from 'dat.gui'
import gsap from 'gsap'

const canvas = document.querySelector('#webgl')

// SCENE

const scene = new THREE.Scene()

// Objects

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

const v = {
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
    c6: [0, 4, 0],
}


const geometry = new THREE.BufferGeometry()
const vertices = new Float32Array([
    // BASE Y = 0
    ...v.a6,    ...v.a5,    ...v.a2,
    ...v.a6,    ...v.a2,    ...v.a1,
    ...v.a3,    ...v.a2,    ...v.a5,
    ...v.a3,    ...v.a5,    ...v.a4,

    // TOP Y = 4
    ...v.c6,    ...v.c2,    ...v.c5,
    ...v.c6,    ...v.c1,    ...v.c2,
    ...v.c3,    ...v.c5,    ...v.c2,
    ...v.c3,    ...v.c4,    ...v.c5,

    // FACE FRONT
    ...v.a6, ...v.a1, ...v.b6,
    ...v.a1, ...v.b1, ...v.b6,
    ...v.c1, ...v.b6, ...v.b1,
    ...v.c1, ...v.c6, ...v.b6,

    // FACE BACK
    ...v.a4, ...v.b4, ...v.a3,
    ...v.a3, ...v.b4, ...v.b3,
    ...v.c3, ...v.b3, ...v.b4,
    ...v.c3, ...v.b4, ...v.c4,

    // FACE LEFT 1 + 2
    ...v.a6, ...v.b6, ...v.a5,
    ...v.b5, ...v.a5, ...v.b6,
    ...v.b5, ...v.b4, ...v.a5,
    ...v.a4, ...v.a5, ...v.b4,

    ...v.c6, ...v.c5, ...v.b6,
    ...v.b5, ...v.b6, ...v.c5,
    ...v.b5, ...v.c5, ...v.b4,
    ...v.b4,  ...v.c5,...v.c4,

    // FACE RIGHT 1 + 2
    ...v.a1, ...v.a2, ...v.b1,
    ...v.b2, ...v.b1, ...v.a2,
    ...v.b2, ...v.a2, ...v.b3,
    ...v.a3, ...v.b3, ...v.a2,

    ...v.c1, ...v.b1, ...v.c2,
    ...v.b2, ...v.c2, ...v.b1,
    ...v.b2, ...v.b3, ...v.c2,
    ...v.c3, ...v.c2, ...v.b3,
])

geometry.setAttribute('position', new THREE.BufferAttribute(vertices, 3))

const parameters = {
    color: 0xff0000,
}

const material = new THREE.MeshBasicMaterial({
    color: parameters.color,
    wireframe: false,
})

const mesh = new THREE.Mesh(geometry, material)

scene.add(mesh)

// Sizes
const sizes = {
    width: 800,
    height: 600,
}

// Camera

const camera = new THREE.PerspectiveCamera(75, sizes.width / sizes.height)

camera.position.set(-5, 5, 5)
scene.add(camera)

const ambientLight = new THREE.AmbientLight(0xffffff, 0.5)
scene.add(ambientLight)

// Renderer

const renderer = new THREE.WebGLRenderer({
    canvas
})

// GUI

const gui = new dat.GUI()
gui.add(camera.position, 'x')
    .min(-3)
    .max(3)
    .step(.2)
gui.add(camera.position, 'y')
    .min(-3)
    .max(3)
    .step(.2)
gui.add(camera.position, 'z')
    .min(-3)
    .max(3)
    .step(.2)
gui.add(material, 'wireframe')
gui.addColor(parameters, 'color')
    .onChange(() => {
        material.color.set(parameters.color)
    })
gui.add(ambientLight, 'intensity').min(0).max(1).step(0.001)

const directionalLight = new THREE.DirectionalLight(0x00fffc, 0.63)
scene.add(directionalLight)

renderer.setSize(sizes.width, sizes.height)

// Time
const clock = new THREE.Clock()

// Controls

const controls = new OrbitControls(camera, canvas)
controls.enableDamping = true

// Animations
const tick = () => {

    const elapsedTime = clock.getElapsedTime()

    controls.update()
    mesh.rotateY(.001)

    renderer.render(scene, camera)

    window.requestAnimationFrame(tick)
}

tick()
