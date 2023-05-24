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

//Background
const backgroundImage = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/background.jpg');
scene.background = backgroundImage;

//Moon FFFFFF 555555 888888   332900
const moonSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/moon_sprite.png');
const lightSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/light_sprite.png');
const geometryMoon = new THREE.PlaneGeometry( 35, 35 );
const materialMoon = new THREE.MeshBasicMaterial( { side: THREE.DoubleSide, transparent: true,color: 0xb3b3ff,opacity: 1, map: moonSprite } );
const geometryLight = new THREE.PlaneGeometry( 70, 70 );
const geometryLight2 = new THREE.PlaneGeometry( 54, 54 );
const materialLight = new THREE.MeshBasicMaterial( { blending: THREE.CustomBlending, blendEquation: THREE.AddEquation, blendSrc: THREE.SrcAlphaFactor,
    blendSrc: THREE.OneFactor, blendDst: THREE.OneMinusSrcAlphaFactor, side: THREE.DoubleSide, transparent: true,color:0x0039e6, opacity: 0.01, map: lightSprite } );
const materialLight2 = new THREE.MeshBasicMaterial( { blending: THREE.CustomBlending, blendEquation: THREE.AddEquation, blendSrc: THREE.SrcAlphaFactor,
    blendSrc: THREE.OneFactor, blendDst: THREE.OneMinusSrcAlphaFactor, side: THREE.DoubleSide, transparent: true,color:0x00001a, opacity: 0.01, map: lightSprite } );
const moon = new THREE.Mesh( geometryMoon, materialMoon );
scene.add( moon );
moon.position.z = -100;
moon.position.y = 50;
moon.position.x = 115;
//Moonlight back
const light = new THREE.Mesh( geometryLight, materialLight );
scene.add( light );
light.position.z = -101;
light.position.y = 50.5;
light.position.x = 116.5;
//Moonlight front
const light2 = new THREE.Mesh( geometryLight2, materialLight2 );
scene.add( light2 );
light2.position.z = -100.5;
light2.position.y = 50;
light2.position.x = 116;

//Set rock
const rockTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/rock_texture.jpg');
const geometry10 = new THREE.SphereGeometry( 1, 3, 18 );
const material10 = new THREE.MeshStandardMaterial( { map: rockTexture } );


//Rock leftside
const sphere = new THREE.Mesh( geometry10, material10 );
scene.add( sphere );
sphere.position.z = -1.12;
sphere.position.x = -6.4;
sphere.position.y = -0.3;

//Rock leftside behind
const sphere5 = new THREE.Mesh( geometry10, material10 );
scene.add( sphere5 );
sphere5.position.z = -2.2;
sphere5.position.x = -5.7;
sphere5.position.y = -0.6;

//Rock rightside
const sphere2 = new THREE.Mesh( geometry10, material10 );
scene.add( sphere2 );
sphere2.position.z = 1;
sphere2.position.y = 0;
sphere2.position.x = 6.3;//5.6

//Rock rightside behind
const sphere3 = new THREE.Mesh( geometry10, material10 );
scene.add( sphere3 );
sphere3.position.z = -0.55;//0.2
sphere3.position.y = -0.2;
sphere3.position.x = 6.4;//5.7

//Rock rightside behind2
const sphere4 = new THREE.Mesh( geometry10, material10 );
scene.add( sphere4 );
sphere4.position.z = -1.1;//-1
sphere4.position.y = -0.4;
sphere4.position.x = 6.2;

//Tree
//Cone bottom
const treeTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/tree_texture.jpg');
const geometry3 = new THREE.ConeGeometry( 1.2, 1.4, 128 );
const material3 = new THREE.MeshStandardMaterial( {map: treeTexture} );
const cone = new THREE.Mesh( geometry3, material3 );
scene.add( cone );
cone.position.z = -2;
cone.position.y = 0.3;
cone.position.x = -0.35;
//cone 2
const geometry4 = new THREE.ConeGeometry( 0.8, 8, 128 );
const cone2 = new THREE.Mesh( geometry4, material3 );
scene.add( cone2 );
cone2.position.z = -2;
cone2.position.y = 1;
//cone2.position.x = -0.1;
cone2.position.x = -0.3;
//cone2.rotation.z = 0.1;
cone2.rotation.z = -0.15;

//Set magpie
const magpieSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/magpie_sprite.png');
const geometrymagpie = new THREE.PlaneGeometry( 1.5, 0.75 );
const materialmagpie = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: magpieSprite} );
//Magpie
const magpie = new THREE.Mesh( geometrymagpie, materialmagpie );
scene.add( magpie );
magpie.position.z = -0.5;
magpie.position.y = 0.25;
magpie.position.x = 4;
//Set leafes
const leaf1Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/leaf1_sprite.png');
const geometryleaf1 = new THREE.PlaneGeometry( 0.1, 0.1 );
const materialleaf1 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: leaf1Sprite} );
const leaf2Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/leaf2_sprite.png');
const geometryleaf2 = new THREE.PlaneGeometry( 0.125, 0.125 );
const materialleaf2 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: leaf2Sprite} );
const leaf3Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/leaf3_sprite.png');
const geometryleaf3 = new THREE.PlaneGeometry( 0.15, 0.15 );
const materialleaf3 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: leaf3Sprite} );
//Leaf1
const leaf1 = new THREE.Mesh( geometryleaf1, materialleaf1 );
scene.add( leaf1 );
leaf1.position.z = -3;
leaf1.position.y = 2+Math.random()*4;
leaf1.position.x = 2.5;
//Leaf2
const leaf2 = new THREE.Mesh( geometryleaf2, materialleaf2 );
scene.add( leaf2 );
leaf2.position.z = -2.95;
leaf2.position.y = 2+Math.random()*4;
leaf2.position.x = 23.5;
//Leaf3
const leaf3 = new THREE.Mesh( geometryleaf3, materialleaf3 );
scene.add( leaf3 );
leaf3.position.z = -2.95;
leaf3.position.y = 2+Math.random()*4;
leaf3.position.x = 19.5;
//Leaf4
const leaf4 = new THREE.Mesh( geometryleaf3, materialleaf1 );
scene.add( leaf4 );
leaf4.position.z = -2.95;
leaf4.position.y = 2+Math.random()*4;
leaf4.position.x = 15.5;
//Leaf5
const leaf5 = new THREE.Mesh( geometryleaf1, materialleaf2 );
scene.add( leaf5 );
leaf5.position.z = -2.95;
leaf5.position.y = 2+Math.random()*4;
leaf5.position.x = 11.5;
//Leaf6
const leaf6 = new THREE.Mesh( geometryleaf2, materialleaf3 );
scene.add( leaf6 );
leaf6.position.z = -2.95;
leaf6.position.y = 2+Math.random()*4;
leaf6.position.x = 7.5;

//Set branches
const branchSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/branch_sprite.png');
const geometry9 = new THREE.PlaneGeometry( 2.5, 2.5 );
const geometryBranch2 = new THREE.PlaneGeometry( 3.5, 3.5 );
const material9 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: branchSprite} );

//Branch behind1
const branchBehind1 = new THREE.Mesh( geometryBranch2, material9 );
scene.add( branchBehind1 );
branchBehind1.position.z = -2.3;
branchBehind1.position.y = 3.4;
branchBehind1.position.x = -2;

//Branch behind2
const branchBehind2 = new THREE.Mesh( geometryBranch2, material9 );
scene.add( branchBehind2 );
branchBehind2.position.z = -2.35;
branchBehind2.position.y = 4.2;
branchBehind2.position.x = -1;
branchBehind2.rotation.z = -0.4;

//Branch behind3
const branchBehind3 = new THREE.Mesh( geometryBranch2, material9 );
scene.add( branchBehind3 );
branchBehind3.position.z = -2.4;
branchBehind3.position.y = 4.2;
branchBehind3.position.x = 0.5;
branchBehind3.rotation.z = -1.1;

//Branch behind4
const branchBehind4 = new THREE.Mesh( geometryBranch2, material9 );
scene.add( branchBehind4 );
branchBehind4.position.z = -2.45;
branchBehind4.position.y = 3.4;
branchBehind4.position.x = 1.4;
branchBehind4.rotation.z = -1.5;

//Branch1
const plane17 = new THREE.Mesh( geometry9, material9 );
scene.add( plane17 );
plane17.position.z = -2;
plane17.position.y = 3.2;
plane17.position.x = -1.25;
plane17.rotation.z = -0.2;
//Branch2
const plane18 = new THREE.Mesh( geometry9, material9 );
scene.add( plane18 );
plane18.position.z = -1.75;
plane18.position.y = 3.7;
plane18.position.x = -0.6;
plane18.rotation.z = -0.5;
//Branch3
const plane19 = new THREE.Mesh( geometry9, material9 );
scene.add( plane19 );
plane19.position.z = -1.8;
plane19.position.y = 3.7;
plane19.position.x = 0.3;
plane19.rotation.z = -1.2;
//Branch4
const plane20 = new THREE.Mesh( geometry9, material9 );
scene.add( plane20 );
plane20.position.z = -2;
plane20.position.y = 2.8;
plane20.position.x = 1.2;
plane20.rotation.z = -1.8;

//set grass 
const grassSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/grass_sprite.png');
grassSprite.wrapS = THREE.RepeatWrapping;
grassSprite.repeat.set( 25, 1 );
const grass2Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/grass2_sprite.png');
grass2Sprite.wrapS = THREE.RepeatWrapping;
grass2Sprite.repeat.set( 30, 1 );
const grass3Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/grass3_sprite.png');
grass3Sprite.wrapS = THREE.RepeatWrapping;
grass3Sprite.repeat.set( 27, 1 );

const geometryGrass = new THREE.PlaneGeometry( 15, 0.5 );
const materialGrass1 = new THREE.MeshStandardMaterial( {side: THREE.DoubleSide, transparent: true, map: grassSprite} );
const materialGrass2 = new THREE.MeshStandardMaterial( {side: THREE.DoubleSide, transparent: true, map: grass2Sprite} );
const materialGrass3 = new THREE.MeshStandardMaterial( {side: THREE.DoubleSide, transparent: true, map: grass3Sprite} );

//Set mist b3b3b3

const mistSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/mist_texture.png');
const materialMist = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true,color:0x0040ff, opacity: 0.15, map: mistSprite } );
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

//Set roots
const dirtSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/dirt_texture.jpg');
const rootsSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/roots_texture.png');
const roots2Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/roots2_texture.png');
const materialDirt = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, map: dirtSprite} );
const materialRoots = new THREE.MeshStandardMaterial( {side: THREE.DoubleSide, transparent: true, map: rootsSprite} );
const materialRoots2 = new THREE.MeshStandardMaterial( {side: THREE.DoubleSide, transparent: true, map: roots2Sprite} );
const materialBlack = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, color: 0x000000} );

//Roots
const geometryDirt = new THREE.PlaneGeometry( 25, 2 );
const geometryBlack = new THREE.PlaneGeometry( 25, 60 );
const geometryRoots = new THREE.PlaneGeometry( 25, 0.4 );
const geometryRoots2 = new THREE.PlaneGeometry( 4, 1.5 );//3.5 2
const dirt = new THREE.Mesh( geometryDirt, materialDirt );
const black = new THREE.Mesh( geometryBlack, materialBlack );
const roots = new THREE.Mesh( geometryRoots, materialRoots );
const roots2 = new THREE.Mesh( geometryRoots2, materialRoots2 );
dirtSprite.wrapS = THREE.RepeatWrapping;
dirtSprite.repeat.set( 25, 1 );
rootsSprite.wrapS = THREE.RepeatWrapping;
rootsSprite.repeat.set( 50, 1 );
scene.add( dirt );
dirt.position.z = 2.49;
dirt.position.y = -1.2;
scene.add( roots );
roots.position.z = 2.495;
roots.position.y = -0.4;
scene.add( black );
black.position.z = 2.485;
black.position.y = -30.5;
scene.add( roots2 );
roots2.position.z = 2.496;
roots2.position.y = -1;
//roots2.position.x = -0.08;
roots2.position.x = -0.2;

//Grass 1 
const grass1 = new THREE.Mesh( geometryGrass, materialGrass1 );
scene.add( grass1 );
grass1.position.z = 2.5;

//Grass 2
const grass2 = new THREE.Mesh( geometryGrass, materialGrass2 );
scene.add( grass2 );
grass2.position.z = 2.1;

//Grass 3
const grass3 = new THREE.Mesh( geometryGrass, materialGrass3 );
scene.add( grass3 );
grass3.position.z = 1.7;

//Grass 4
const grass4 = new THREE.Mesh( geometryGrass, materialGrass1 );
scene.add( grass4 );
grass4.position.z = 1.3;

//Grass 5
const grass5 = new THREE.Mesh( geometryGrass, materialGrass2 );
scene.add( grass5 );
grass5.position.z = 0.9;

//Grass 6
const grass6 = new THREE.Mesh( geometryGrass, materialGrass3 );
scene.add( grass6 );
grass6.position.z = 0.5;

//Grass 7
const grass7 = new THREE.Mesh( geometryGrass, materialGrass1 );
scene.add( grass7 );
grass7.position.z = 0.1;

//Grass 8
const grass8 = new THREE.Mesh( geometryGrass, materialGrass2 );
scene.add( grass8 );
grass8.position.z = -0.3;

//Grass 9
const grass9 = new THREE.Mesh( geometryGrass, materialGrass3 );
scene.add( grass9 );
grass9.position.z = -0.7;

//Grass 10
const grass10 = new THREE.Mesh( geometryGrass, materialGrass1 );
scene.add( grass10 );
grass10.position.z = -1.1;

//Grass 11
const grass11 = new THREE.Mesh( geometryGrass, materialGrass2 );
scene.add( grass11 );
grass11.position.z = -1.5;

//Grass 12
const grass12 = new THREE.Mesh( geometryGrass, materialGrass3 );
scene.add( grass12 );
grass12.position.z = -1.9;

//Grass 13
const grass13 = new THREE.Mesh( geometryGrass, materialGrass1 );
scene.add( grass13 );
grass13.position.z = -2.3;


//Camera Pos
camera.position.z = 5.1;
camera.position.y = 2;
camera.position.x = -0.3;

//Light
const pointLight = new THREE.PointLight(0x696969);
pointLight.position.set(0,50,30);
scene.add(pointLight);
//Setting variables
var gMove2 = false;
var gMove3 = true;
var gMove4 = false;
var gMove5 = true;
var gMove6 = false;
var gMove7 = true;
var gMove8 = false;
var gMove9 = true;
var gMove10 = false;
var gMove11 = true;
var gMove12 = false;
var gMove13 = true;
var bMove1 = true;
var bMove2 = false;
var bMove3 = false;
var bMove4 = true;
var bMove5 = false;
var bMove6 = true;
var bMove7 = false;
var bMove8 = true;
var camMove = false;
var a = -0.002;


var lMove = false;
var lMove2 = false;
var s = 0;
var s2 = 0;

var magpiemovement = true;
var m = 0;
var random = Math.random();
var dir = 0;
var setDir = Math.random();
var mRot = false;


//Render scene
function animate() {
    requestAnimationFrame( animate );


    window.addEventListener("scroll", (event) => {
    let scroll = this.scrollY;
    camera.position.y = 2 - scroll/100;
    });

    //Foregrounds
    //Mist1 move
    mist.position.x += 0.005;
    if(mist.position.x > 17){mist.position.x =-17;}
    //Mist2 move
    mist2.position.x += 0.0025;
    if(mist2.position.x > 19){mist2.position.x =-19;}
    //Mist3 move
    mist3.position.x += 0.001;
    if(mist3.position.x > 22){mist3.position.x =-22;}


    //Moon light scale
    s = Math.random()/5;
    s2 = Math.random()/5;
    if(light.position.z <= -101.1){lMove = true;}
    if(light.position.z >= -101){lMove = false;}
    if(lMove == true){light.position.z += s;light.position.x -= s;light.position.y += s;}
    if(lMove == false){light.position.z -= s;light.position.x += s;light.position.y -= s;}

    if(light2.position.z <= -100.6){lMove2 = true;}
    if(light2.position.z >= -100.5){lMove2 = false;}
    if(lMove2 == true){light2.position.z += s2;light2.position.x -= s2;light2.position.y += s2;}
    if(lMove2 == false){light2.position.z -= s2;light2.position.x += s2;light2.position.y -= s2;}

    //Magpie move
    random = Math.random();
    if(random > 0.99 && magpiemovement == false){magpiemovement = true;}
    if(magpiemovement == true && m < 5){
        magpie.position.y += 0.02;
        m += 1;
        if(dir == 0){magpie.position.x -= 0.02 + Math.random()/12;}
        if(dir == 1){magpie.position.x += 0.02 + Math.random()/12;}
    }
    if(m >= 5){magpiemovement = false;m = 0;magpie.position.y = 0.25;}
    //Magpie direction

    //Set random turn
    if(magpie.position.x > -3 && magpie.position.x < 3.5){
        if(magpie.rotation.y == 0 || magpie.rotation.y == 3){
            setDir = Math.random();
        }
    }
    if(setDir > 0.999 && dir == 0){setDir = 0;dir = 1;}
    if(dir == 1 && magpie.rotation.y != 3){
        if(mRot == false){magpie.rotation.y += 0.45;}
        if(magpie.rotation.y >= 3){magpie.rotation.y = 3;mRot = true;}
    }
    if(setDir > 0.999 && dir == 1){setDir = 0;dir = 0;}
    if(dir == 0 && magpie.rotation.y != 0){
        if(mRot == true){magpie.rotation.y -= 0.45;}
        if(magpie.rotation.y <= 0){magpie.rotation.y = 0;mRot = false;}
    }
    //Cap distance
    if(magpie.position.x < -4){dir = 1;}
    if(magpie.position.x > 4.5){dir = 0;}
    
    //Leaf1 animation
    leaf1.rotation.z -= Math.random()/25;
    leaf1.rotation.y -= Math.random()/25;
    if(leaf1.position.x > 25){leaf1.position.x = 0;leaf1.position.y = 2+Math.random()*4;}
    leaf1.position.x += 0.0005 + Math.random()/100;
    leaf1.position.y -= 0.0001 + Math.random()/500;

    //Leaf2 animation
    leaf2.rotation.z -= Math.random()/25;
    leaf2.rotation.y -= Math.random()/25;
    if(leaf2.position.x > 25){leaf2.position.x = 0;leaf2.position.y = 2+Math.random()*4;}
    leaf2.position.x += 0.0005 + Math.random()/100;
    leaf2.position.y -= 0.0001 + Math.random()/500;

    //Leaf3 animation
    leaf3.rotation.z -= Math.random()/25;
    leaf3.rotation.y -= Math.random()/25;
    if(leaf3.position.x > 25){leaf3.position.x = 0;leaf3.position.y = 2+Math.random()*4;}
    leaf3.position.x += 0.0005 + Math.random()/100;
    leaf3.position.y -= 0.0001 + Math.random()/500;

    //Leaf4 animation
    leaf4.rotation.z -= Math.random()/25;
    leaf4.rotation.y -= Math.random()/25;
    if(leaf4.position.x > 25){leaf4.position.x = 0;leaf4.position.y = 2+Math.random()*4;}
    leaf4.position.x += 0.0005 + Math.random()/100;
    leaf4.position.y -= 0.0001 + Math.random()/500;

    //Leaf5 animation
    leaf5.rotation.z -= Math.random()/25;
    leaf5.rotation.y -= Math.random()/25;
    if(leaf5.position.x > 25){leaf5.position.x = 0;leaf5.position.y = 2+Math.random()*4;}
    leaf5.position.x += 0.0005 + Math.random()/100;
    leaf5.position.y -= 0.0001 + Math.random()/500;

    //Leaf6 animation
    leaf6.rotation.z -= Math.random()/25;
    leaf6.rotation.y -= Math.random()/25;
    if(leaf6.position.x > 25){leaf6.position.x = 0;leaf6.position.y = 2+Math.random()*4;}
    leaf6.position.x += 0.0005 + Math.random()/100;
    leaf6.position.y -= 0.0001 + Math.random()/500;

    //Grass animation
    //Grass2 line
    if(grass2.position.z < 2.09){gMove2 = true;}if(grass2.position.z > 2.11){gMove2 = false;}
    if(gMove2 == true){grass2.position.z += Math.random()/4000;}if(gMove2 == false){grass2.position.z -= Math.random()/4000;}

    //Grass3 line
    if(grass3.position.z < 1.69){gMove3 = true;}if(grass3.position.z > 1.71){gMove3 = false;}
    if(gMove3 == true){grass3.position.z += Math.random()/4000;}if(gMove3 == false){grass3.position.z -= Math.random()/4000;}

    //Grass4 line
    if(grass4.position.z < 1.29){gMove4 = true;}if(grass4.position.z > 1.31){gMove4 = false;}
    if(gMove4 == true){grass4.position.z += Math.random()/4000;}if(gMove4 == false){grass4.position.z -= Math.random()/4000;}

    //Grass5 line
    if(grass5.position.z < 0.89){gMove5 = true;}if(grass5.position.z > 0.91){gMove5 = false;}
    if(gMove5 == true){grass5.position.z += Math.random()/4000;}if(gMove5 == false){grass5.position.z -= Math.random()/4000;}

    //Grass6 line
    if(grass6.position.z < 0.49){gMove6 = true;}if(grass6.position.z > 0.51){gMove6 = false;}
    if(gMove6 == true){grass6.position.z += Math.random()/3500;}if(gMove6 == false){grass6.position.z -= Math.random()/3500;}

    //Grass7 line
    if(grass7.position.z < 0.09){gMove7 = true;}if(grass7.position.z > 0.11){gMove7 = false;}
    if(gMove7 == true){grass7.position.z += Math.random()/3000;}if(gMove7 == false){grass7.position.z -= Math.random()/3000;}

    //Grass8 line
    if(grass8.position.z < -0.31){gMove8 = true;}if(grass8.position.z > -0.29){gMove8 = false;}
    if(gMove8 == true){grass8.position.z += Math.random()/2500;}if(gMove8 == false){grass8.position.z -= Math.random()/2500;}

    //Grass9 line
    if(grass9.position.z < -0.71){gMove9 = true;}if(grass9.position.z > -0.69){gMove9 = false;}
    if(gMove9 == true){grass9.position.z += Math.random()/2000;}if(gMove9 == false){grass9.position.z -= Math.random()/2000;}

    //Grass10 line
    if(grass10.position.z < -1.11){gMove10 = true;}if(grass10.position.z > -1.09){gMove10 = false;}
    if(gMove10 == true){grass10.position.z += Math.random()/2000;}if(gMove10 == false){grass10.position.z -= Math.random()/2000;}

    //Grass11 line
    if(grass11.position.z < -1.51){gMove11 = true;}if(grass11.position.z > -1.49){gMove11 = false;}
    if(gMove11 == true){grass11.position.z += Math.random()/2000;}if(gMove11 == false){grass11.position.z -= Math.random()/2000;}

    //Grass12 line
    if(grass12.position.z < -1.91){gMove12 = true;}if(grass12.position.z > -1.89){gMove12 = false;}
    if(gMove12 == true){grass12.position.z += Math.random()/2000;}if(gMove12 == false){grass12.position.z -= Math.random()/2000;}

    //Grass13 line
    if(grass13.position.z < -2.31){gMove13 = true;}if(grass13.position.z > -2.29){gMove13 = false;}
    if(gMove13 == true){grass13.position.z += Math.random()/2000;}if(gMove13 == false){grass13.position.z -= Math.random()/2000;}

    //branch1 movement
    if(plane17.rotation.z < -0.21){bMove1 = true;}if(plane17.rotation.z > -0.19){bMove1 = false;}
    if(bMove1 == true){plane17.rotation.z += Math.random()/2000;}if(bMove1 == false){plane17.rotation.z -= Math.random()/2000;}

    //branch2 movement
    if(plane18.rotation.z < -0.51){bMove2 = true;}if(plane18.rotation.z > -0.49){bMove2 = false;}
    if(bMove2 == true){plane18.rotation.z += Math.random()/2000;}if(bMove2 == false){plane18.rotation.z -= Math.random()/2000;}

    //branch3 movement
    if(plane19.rotation.z < -1.21){bMove3 = true;}if(plane19.rotation.z > -1.19){bMove3 = false;}
    if(bMove3 == true){plane19.rotation.z += Math.random()/2000;}if(bMove3 == false){plane19.rotation.z -= Math.random()/2000;}

    //branch4 movement
    if(plane20.rotation.z < -1.81){bMove4 = true;}if(plane20.rotation.z > -1.79){bMove4 = false;}
    if(bMove4 == true){plane20.rotation.z += Math.random()/2000;}if(bMove4 == false){plane20.rotation.z -= Math.random()/2000;}

    //branch behind1 movement
    if(branchBehind1.rotation.z < -0.01){bMove5 = true;}if(branchBehind1.rotation.z > 0.01){bMove5 = false;}
    if(bMove5 == true){branchBehind1.rotation.z += Math.random()/4000;}if(bMove5 == false){branchBehind1.rotation.z -= Math.random()/4000;}

    //branch behind2 movement
    if(branchBehind2.rotation.z < -0.41){bMove6 = true;}if(branchBehind2.rotation.z > -0.39){bMove6 = false;}
    if(bMove6 == true){branchBehind2.rotation.z += Math.random()/4000;}if(bMove6 == false){branchBehind2.rotation.z -= Math.random()/4000;}

    //branch behind3 movement
    if(branchBehind3.rotation.z < -1.11){bMove7 = true;}if(branchBehind3.rotation.z > -1.09){bMove7 = false;}
    if(bMove7 == true){branchBehind3.rotation.z += Math.random()/4000;}if(bMove7 == false){branchBehind3.rotation.z -= Math.random()/4000;}

    //branch behind4 movement
    if(branchBehind4.rotation.z < -1.51){bMove8 = true;}if(branchBehind4.rotation.z > -1.49){bMove8 = false;}
    if(bMove8 == true){branchBehind4.rotation.z += Math.random()/4000;}if(bMove8 == false){branchBehind4.rotation.z -= Math.random()/4000;}
    
    //Camera movement
    //if(camera.position.x < -0.2){camMove = true;}if(camera.position.x > 0.2){camMove = false;}
    if(camera.position.z < 4.3){camMove = true;}if(camera.position.z > 4.9){camMove = false;}
    if(camMove == true){camera.position.z += a;}if(camMove == false){camera.position.z += a;}
    if(camMove == true && a < 0.002){a += 0.000005;}
    if(camMove == false && a > -0.002){a -= 0.000005;}
    //camera.position.z = camera.position.x+5;

    renderer.render( scene, camera );
}

animate();