//Creating scene
var URLROOT = getURLROOT();


const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

const renderer = new THREE.WebGLRenderer();

container = document.getElementById('container3D');
width = document.querySelector('#container3D').offsetWidth;
height = document.querySelector('#container3D').offsetHeight;
renderer.setPixelRatio( window.devicePixelRatio );
renderer.setSize(width, height);
container.appendChild(renderer.domElement);

//Allow to resize window
window.addEventListener( 'resize', onWindowResize, false );

function onWindowResize(){
	container = document.getElementById('container3D');
	width = document.querySelector('#container3D').offsetWidth;
	height = document.querySelector('#container3D').offsetHeight;
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(width, height);
}

//Set galaxy background
const galaxySprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/2020aspaceodyssey/galaxy_background.png');
const materialGalaxy = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, opacity: 0.1, map: galaxySprite } );
const geometryGalaxy = new THREE.PlaneGeometry( 160, 60 );
const galaxy = new THREE.Mesh( geometryGalaxy, materialGalaxy );
scene.add( galaxy );
galaxy.position.z = -40;
galaxy.position.y = 1.7;
galaxy.position.x = 0;
//Set stars1 background
const stars1Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/2020aspaceodyssey/stars_background.png');
stars1Sprite.wrapS = THREE.RepeatWrapping;
stars1Sprite.repeat.set( 4, 4 );
const materialStars = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, opacity: 0.5, map: stars1Sprite } );
const geometryStars = new THREE.PlaneGeometry( 170, 260 );
const stars = new THREE.Mesh( geometryStars, materialStars );
scene.add( stars );
stars.position.z = -37;
stars.position.y = 100;
stars.position.x = 0;
//Set stars2 background
const stars2Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/2020aspaceodyssey/stars2_background.png');
stars2Sprite.wrapS = THREE.RepeatWrapping;
stars2Sprite.repeat.set( 3, 3 );
const materialStars2 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, opacity: 0.7, map: stars2Sprite } );
const geometryStars2 = new THREE.PlaneGeometry( 170, 260 );
const stars2 = new THREE.Mesh( geometryStars2, materialStars2 );
scene.add( stars2 );
stars2.position.z = -34;
stars2.position.y = 100;
stars2.position.x = 0;
//Set stars3 background
const stars3Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/2020aspaceodyssey/stars3_background.png');
stars3Sprite.wrapS = THREE.RepeatWrapping;
stars3Sprite.repeat.set( 2, 2 );
const materialStars3 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, opacity: 0.9, map: stars3Sprite } );
const geometryStars3 = new THREE.PlaneGeometry( 170, 260 );
const stars3 = new THREE.Mesh( geometryStars3, materialStars3 );
scene.add( stars3 );
stars3.position.z = -30;
stars3.position.y = 100;
stars3.position.x = 0;
//Set mist
const mistSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/mist_texture.png');
const materialMist = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true,color:0xb3b3b3, opacity: 0.05, map: mistSprite } );
//Mist
const geometryMist = new THREE.PlaneGeometry( 25, 4 );
const geometryMist2 = new THREE.PlaneGeometry( 25, 5 );
const geometryMist3 = new THREE.PlaneGeometry( 25, 6 );
const mist = new THREE.Mesh( geometryMist, materialMist );
scene.add( mist );
mist.position.z = 2.51;
mist.position.y = 1.7;
mist.position.x = 0;
//Mist2
const mist2 = new THREE.Mesh( geometryMist2, materialMist );
scene.add( mist2 );
mist2.position.z = 2;
mist2.position.y = 2;
mist2.position.x = -15;
//Mist3
const mist3 = new THREE.Mesh( geometryMist3, materialMist );
scene.add( mist3 );
mist3.position.z = 1.5;
mist3.position.y = 2.5;
mist3.position.x = -15;

//Planet1(left side)
const planet1Texture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/2020aspaceodyssey/planet1_texture.jpg');
planet1Texture.wrapS = THREE.RepeatWrapping;
planet1Texture.repeat.set( 3, 1 );
const planet1Geometry = new THREE.SphereGeometry( 5, 32, 32 );
const planet1Material = new THREE.MeshStandardMaterial( {map: planet1Texture} );
const planet1 = new THREE.Mesh( planet1Geometry, planet1Material );
scene.add( planet1 );
planet1.position.x = -18;
planet1.position.z = -17;
planet1.position.y = 2;
//Planet2(right side)
const planet2Texture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/2020aspaceodyssey/planet2_texture.jpg');
planet2Texture.wrapS = THREE.RepeatWrapping;
planet2Texture.repeat.set( 2, 1 );
const planet2Geometry = new THREE.SphereGeometry( 2, 32, 32 );
const planet2Material = new THREE.MeshStandardMaterial( {map: planet2Texture} );
const planet2 = new THREE.Mesh( planet2Geometry, planet2Material );
scene.add( planet2 );
planet2.position.x = 22;
planet2.position.z = -23;
planet2.position.y = -1;

//Shadow1
const geometryShadow1 = new THREE.ConeGeometry( 25, 100, 128 );
const materialShadow1 = new THREE.MeshBasicMaterial( {transparent: true, opacity: 0.3, color:0x000000} );
const shadow1 = new THREE.Mesh( geometryShadow1, materialShadow1 );
scene.add( shadow1 );
shadow1.position.z = -24;
shadow1.position.y = 1;
shadow1.position.x = -42;
shadow1.rotation.x = 29;//29.35
shadow1.rotation.z = -1.2;//-1.3
shadow1.rotation.y = -0.5;

//Shadow2
const geometryShadow2 = new THREE.ConeGeometry( 5.5, 100, 128 );
const shadow2 = new THREE.Mesh( geometryShadow2, materialShadow1 );
scene.add( shadow2 );
shadow2.position.z = -34;
shadow2.position.y = -2;
shadow2.position.x = 31;
shadow2.rotation.x = 20.35;
shadow2.rotation.z = 3.4;

//Sun
const lightSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/light_sprite.png');
const geometryLight = new THREE.PlaneGeometry( 18, 18 );
const materialLight = new THREE.MeshBasicMaterial( { blending: THREE.CustomBlending, blendEquation: THREE.AddEquation, blendSrc: THREE.SrcAlphaFactor,
    blendSrc: THREE.OneFactor, blendDst: THREE.OneMinusSrcAlphaFactor, side: THREE.DoubleSide, transparent: true,color:0x999999, opacity: 0.0005, map: lightSprite } );
const light = new THREE.Mesh( geometryLight, materialLight );
scene.add( light );
light.position.z = -79;
light.position.y = 0;
light.position.x = 0;
//Second light
const lightSprite2 = new THREE.TextureLoader().load(URLROOT + 'public/graphic/2020aspaceodyssey/sunlight_sprite.png');
const geometryLight2 = new THREE.PlaneGeometry( 18, 18 );
const materialLight2 = new THREE.MeshBasicMaterial( { blending: THREE.CustomBlending, blendEquation: THREE.AddEquation, blendSrc: THREE.SrcAlphaFactor,
    blendSrc: THREE.OneFactor, blendDst: THREE.OneMinusSrcAlphaFactor, side: THREE.DoubleSide, transparent: true,color:0x151515, opacity: 0.0001, map: lightSprite2 } );
const light2 = new THREE.Mesh( geometryLight2, materialLight2 );
scene.add( light2 );
light2.position.z = -80;
light2.position.y = 0;
light2.position.x = 0;
//Third light
const geometryLight3 = new THREE.PlaneGeometry( 27, 27 );
const materialLight3 = new THREE.MeshBasicMaterial( { blending: THREE.CustomBlending, blendEquation: THREE.AddEquation, blendSrc: THREE.SrcAlphaFactor,
    blendSrc: THREE.OneFactor, blendDst: THREE.OneMinusSrcAlphaFactor, side: THREE.DoubleSide, transparent: true,color:0x666666, opacity: 0.0001, map: lightSprite } );
const light3 = new THREE.Mesh( geometryLight3, materialLight3 );
scene.add( light3 );
light3.position.z = -78;
light3.position.y = 0;
light3.position.x = 0;
//Fourth light
const geometryLight4 = new THREE.PlaneGeometry( 32, 32 );
const materialLight4 = new THREE.MeshBasicMaterial( { blending: THREE.CustomBlending, blendEquation: THREE.AddEquation, blendSrc: THREE.SrcAlphaFactor,
    blendSrc: THREE.OneFactor, blendDst: THREE.OneMinusSrcAlphaFactor, side: THREE.DoubleSide, transparent: true,color:0x333333, opacity: 0.0001, map: lightSprite } );
const light4 = new THREE.Mesh( geometryLight4, materialLight4 );
scene.add( light4 );
light4.position.z = -77;
light4.position.y = 0;
light4.position.x = 0;
//Fift light
const geometryLight5 = new THREE.PlaneGeometry( 50, 50 );
const materialLight5 = new THREE.MeshBasicMaterial( { blending: THREE.CustomBlending, blendEquation: THREE.AddEquation, blendSrc: THREE.SrcAlphaFactor,
    blendSrc: THREE.OneFactor, blendDst: THREE.OneMinusSrcAlphaFactor, side: THREE.DoubleSide, transparent: true,color:0x151515, opacity: 0.0001, map: lightSprite } );
const light5 = new THREE.Mesh( geometryLight5, materialLight5 );
scene.add( light5 );
light5.position.z = -76;
light5.position.y = 0;
light5.position.x = 0;

//Camera Pos
camera.position.z = 5.1;
camera.position.y = 2;
camera.position.x = -0.3;

//Light
const pointLight = new THREE.PointLight(0xFFFFFF);
pointLight.position.set(0,0,-13);
scene.add(pointLight);
//Setting variables
var camMove = false;
var a = -0.002;

//Sunlight
var lMove = false;
var lMove2 = false;
var lMove3 = false;
var lMove4 = false;
var s = 0;
var s2 = 0;
var s3 = 0;
var s4 = 0;


//Render scene
function animate() {
    requestAnimationFrame( animate );

    window.addEventListener("scroll", (event) => {
        let scroll = this.scrollY;
        camera.position.z = 5.1 + scroll/50;
        });

    //Foregrounds
    //Mist1 move
    mist.position.x += 0.0025;
    if(mist.position.x > 27){mist.position.x =-27;}
    //Mist2 move
    mist2.position.x += 0.00125;
    if(mist2.position.x > 29){mist2.position.x =-29;}
    //Mist3 move
    mist3.position.x += 0.0005;
    if(mist3.position.x > 32){mist3.position.x =-32;}

    //Planet rotations
    planet1.rotation.y += 0.001;
    planet1.rotation.z += 0.0001;

    planet2.rotation.y += 0.0012;
    planet2.rotation.z += 0.00012;

    //Sunlight scale
    s = Math.random()/20;
    s2 = Math.random()/15;
    s3 = Math.random()/10;
    s4 = Math.random()/10;

    if(light.position.z <= -79.005){lMove = true;}
    if(light.position.z >= -79){lMove = false;}
    if(lMove == true){light.position.z += s;light.position.x -= s;light.position.y += s;}
    if(lMove == false){light.position.z -= s;light.position.x += s;light.position.y -= s;}

    if(light2.position.z <= -80.0075){lMove2 = true;}
    if(light2.position.z >= -80){lMove2 = false;}
    if(lMove2 == true){light2.position.z += s2;light2.position.x -= s2;light2.position.y += s2;}
    if(lMove2 == false){light2.position.z -= s2;light2.position.x += s2;light2.position.y -= s2;}

    if(light3.position.z <= -78.01){lMove3 = true;}
    if(light3.position.z >= -78){lMove3 = false;}
    if(lMove3 == true){light3.position.z += s3;light3.position.x -= s3;light3.position.y += s3;}
    if(lMove3 == false){light3.position.z -= s3;light3.position.x += s3;light3.position.y -= s3;}

    if(light4.position.z <= -77.01){lMove4 = true;}
    if(light4.position.z >= -77){lMove4 = false;}
    if(lMove4 == true){light4.position.z += s4;light4.position.x -= s4;light4.position.y += s4;}
    if(lMove4 == false){light4.position.z -= s4;light4.position.x += s4;light4.position.y -= s4;}
    
    //Camera movement
    if(camera.position.z < 4.3){camMove = true;}if(camera.position.z > 4.9){camMove = false;}
    if(camMove == true){camera.position.z += a;}if(camMove == false){camera.position.z += a;}
    if(camMove == true && a < 0.002){a += 0.000005;}
    if(camMove == false && a > -0.002){a -= 0.000005;}

    renderer.render( scene, camera );
}
animate();