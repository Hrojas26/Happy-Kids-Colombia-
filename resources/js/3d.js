import * as THREE from "/node_modules/.vite/deps/three.js?v=b50a54b2";
import { GLTFLoader } from "/node_modules/.vite/deps/three_examples_jsm_loaders_GLTFLoader__js.js?v=b50a54b2";
import { OrbitControls } from "/node_modules/.vite/deps/three_examples_jsm_controls_OrbitControls__js.js?v=b50a54b2";

// Seleccionar el contenedor del objeto 3D
const container = document.getElementById('container3D');

// Comprobar si el contenedor existe
if (container) {
    // Crear el renderizador y establecer el fondo transparente
    const renderer = new THREE.WebGLRenderer({ alpha: true, clearAlpha: 0 });
    renderer.setSize(container.offsetWidth, container.offsetHeight);
    container.appendChild(renderer.domElement);

    const scene = new THREE.Scene();
    const camera = new THREE.PerspectiveCamera(75, container.offsetWidth / container.offsetHeight, 0.1, 1000);

    const loader = new GLTFLoader();

    let model;
    let autoRotate = true; // Variable para controlar la rotación automática

    loader.load('/three/car.glb', function (gltf) {
        model = gltf.scene;

        // Agregar luz direccional
        const directionalLight = new THREE.DirectionalLight(0xffffff, 3);
        directionalLight.position.set(1, 1, 1);
        scene.add(directionalLight);

        // Agregar luz ambiental
        const ambientLight = new THREE.AmbientLight(0xffffff, 1);
        scene.add(ambientLight);

        model.position.y = -1.2;
        scene.add(model);
    }, undefined, function (error) {
        console.error(error);
    });

    camera.position.z = 2.5;

    const controls = new OrbitControls(camera, renderer.domElement);
    controls.enableZoom = false;
    controls.enableRotate = true;
    controls.rotateSpeed = 0.5;
    controls.enablePan = false;
    controls.panSpeed = 0.5;

    function animate() {
        requestAnimationFrame(animate);

        const start = performance.now(); // Iniciar medición de tiempo

        // Rotación automática del modelo
        if (autoRotate && model) {
            model.rotation.y += 0.006; // Ajusta la velocidad de rotación según sea necesario
        }

        controls.update();
        renderer.render(scene, camera);

        const end = performance.now(); // Finalizar medición de tiempo

    }

    // Detectar cuando el usuario empieza a manipular el objeto
    controls.addEventListener('start', function () {
        autoRotate = false; // Detener la rotación automática
    });

    // Detectar cuando el usuario deja de manipular el objeto
    controls.addEventListener('end', function () {
        autoRotate = true; // Permitir la rotación automática nuevamente
    });

    animate();
} else {
    console.error("El contenedor 3D no se encontró.");
}




