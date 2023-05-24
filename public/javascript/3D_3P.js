//Creating scene
let URLROOT = getURLROOT();


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
const backgroundImage = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/background.jpg');
scene.background = backgroundImage;

/*
const backgroundImg = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/background.jpg');
const materialBackground = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, map: backgroundImg } );
const backgroundGeometry = new THREE.PlaneGeometry( 640, 320 );
const background = new THREE.Mesh( backgroundGeometry, materialBackground );
scene.add( background );
background.position.z = -180;
*/

//Set black floor
const materialBlackFloor = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, color:0x000000 } );
const geometryBlackFloor = new THREE.PlaneGeometry( 140, 15 );
const blackFloor = new THREE.Mesh( geometryBlackFloor, materialBlackFloor );
scene.add( blackFloor );
blackFloor.rotation.x = 80;
blackFloor.position.y = -10;
blackFloor.position.z = 0;

//Set cloud1
const cloud1Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/cloud1_sprite.png');
const materialCloud1 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: cloud1Sprite } );
const geometryCloud = new THREE.PlaneGeometry( 60, 25 );
const cloud1 = new THREE.Mesh( geometryCloud, materialCloud1 );
scene.add( cloud1 );
cloud1.position.z = -80;
cloud1.position.y = 35;
cloud1.position.x = -85;

//Set cloud2
const cloud2Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/cloud2_sprite.png');
const materialCloud2 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: cloud2Sprite } );
const cloud2 = new THREE.Mesh( geometryCloud, materialCloud2 );
scene.add( cloud2 );
cloud2.position.z = -80;
cloud2.position.y = 25;
cloud2.position.x = 85;

//Set cloud3
const cloud3Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/cloud3_sprite.png');
const materialCloud3 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: cloud3Sprite } );
const cloud3 = new THREE.Mesh( geometryCloud, materialCloud3 );
scene.add( cloud3 );
cloud3.position.z = -80;
cloud3.position.y = 30;
cloud3.position.x = -200;

///Moon
const moonSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/moon_sprite.png');
const materialMoon = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: moonSprite } );
const geometryMoon = new THREE.PlaneGeometry( 35, 35 );
const Moon = new THREE.Mesh( geometryMoon, materialMoon );
scene.add( Moon );
Moon.position.z = -85;
Moon.position.y = 37;
Moon.position.x = 0;
//MoonLight
const lightSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/light_sprite.png');
const geometryLight = new THREE.PlaneGeometry( 50, 50 );
const materialLight = new THREE.MeshBasicMaterial( { blending: THREE.CustomBlending, blendEquation: THREE.AddEquation, blendSrc: THREE.SrcAlphaFactor,
    blendSrc: THREE.OneFactor, blendDst: THREE.OneMinusSrcAlphaFactor, side: THREE.DoubleSide, transparent: true,color:0x666666, opacity: 0.01, map: lightSprite } );
//Light back
const light = new THREE.Mesh( geometryLight, materialLight );
scene.add( light );
light.position.z = -86;
light.position.y = 37;
light.position.x = 0;
//Light front
const geometryLight2 = new THREE.PlaneGeometry( 45, 45 );
const light2 = new THREE.Mesh( geometryLight2, materialLight );
scene.add( light2 );
light2.position.z = -84;
light2.position.y = 37;
light2.position.x = 0;

//Path
const pathTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/path_texture.jpg');
pathTexture.wrapS = THREE.RepeatWrapping;
pathTexture.repeat.set( 8, 1 );
const geometryPath = new THREE.PlaneGeometry( 140, 15 );
const materialPath = new THREE.MeshStandardMaterial( { map: pathTexture } );
const Path = new THREE.Mesh( geometryPath, materialPath );
scene.add( Path );
Path.rotation.x = 80;
Path.position.y = -10;
Path.position.z = -20;

//set grass 
const grassSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/grass_sprite.png');
grassSprite.wrapS = THREE.RepeatWrapping;
grassSprite.repeat.set( 30, 1 );
const geometryGrass = new THREE.PlaneGeometry( 190, 3 );
const materialGrass = new THREE.MeshStandardMaterial( {side: THREE.DoubleSide, transparent: true, map: grassSprite} );
//Grass back
//Grass 1 
const grass1 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass1 );
grass1.position.z = -29;
grass1.position.y = -10;

//Grass 2 
const grass2 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass2 );
grass2.position.z = -33;
grass2.position.y = -10;

//Grass 3
const grass3 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass3 );
grass3.position.z = -37;
grass3.position.y = -10;

//Grass 4
const grass4 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass4 );
grass4.position.z = -41;
grass4.position.y = -10;

//Grass front
//Grass 5
const grass5 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass5 );
grass5.position.z = -12.5;
grass5.position.y = -8.5;

//Grass 6
const grass6 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass6 );
grass6.position.z = -10.5;
grass6.position.y = -8.5;

//Grass 7
const grass7 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass7 );
grass7.position.z = -8.5;
grass7.position.y = -8.5;

//Grass 8
const grass8 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass8 );
grass8.position.z = -6.5;
grass8.position.y = -8.5;

//Grass 9
const grass9 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass9 );
grass9.position.z = -4.5;
grass9.position.y = -8.5;

//Grass 10
const grass10 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass10 );
grass10.position.z = -2.5;
grass10.position.y = -8.5;

//Grass 11
const grass11 = new THREE.Mesh( geometryGrass, materialGrass );
scene.add( grass11 );
grass11.position.z = -0.5;
grass11.position.y = -8.5;

//Fence
const fenceTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/wood_texture.jpg');
fenceTexture.wrapS = THREE.RepeatWrapping;
fenceTexture.repeat.set( 30, 1 );
const materialFence = new THREE.MeshStandardMaterial( { map: fenceTexture } );
const geometryFence = new THREE.BoxGeometry( 200, 2.5 );
const fenceUpperpart = new THREE.Mesh( geometryFence, materialFence );
scene.add( fenceUpperpart );
fenceUpperpart.position.z = -40;
fenceUpperpart.position.y = -3;

//Fence under
const cylinderTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/wood_texture.jpg');
const geometryCylinder = new THREE.CylinderGeometry( 0.3, 0.3, 10, 32 );
const materialCylider = new THREE.MeshBasicMaterial( {map: cylinderTexture} );
//Middle
//Cylinder1
const cylinder1 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder1 );
cylinder1.position.z = -40;
cylinder1.position.y = -9;
cylinder1.rotation.z = -0.05;
//Right Sides
//Cylinder2
const cylinder2 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder2 );
cylinder2.position.z = -40;
cylinder2.position.y = -9;
cylinder2.position.x = 15;
cylinder2.rotation.z = -0.15;

//Cylinder3
const cylinder3 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder3 );
cylinder3.position.z = -40;
cylinder3.position.y = -9;
cylinder3.position.x = 30;
cylinder3.rotation.z = 0.2;

//Cylinder4
const cylinder4 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder4 );
cylinder4.position.z = -40;
cylinder4.position.y = -9;
cylinder4.position.x = 45;
cylinder4.rotation.z = 0.05;

//Cylinder5
const cylinder5 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder5 );
cylinder5.position.z = -40;
cylinder5.position.y = -9;
cylinder5.position.x = 60;
cylinder5.rotation.z = -0.05;

//Cylinder6
const cylinder6 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder6 );
cylinder6.position.z = -40;
cylinder6.position.y = -9;
cylinder6.position.x = 75;
cylinder6.rotation.z = 0.2;

//Left sides
//Cylinder7
const cylinder7 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder7 );
cylinder7.position.z = -40;
cylinder7.position.y = -9;
cylinder7.position.x = -15;
cylinder7.rotation.z = 0.1;

//Cylinder8
const cylinder8 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder8 );
cylinder8.position.z = -40;
cylinder8.position.y = -9;
cylinder8.position.x = -30;
cylinder8.rotation.z = -0.1;

//Cylinder9
const cylinder9 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder9 );
cylinder9.position.z = -40;
cylinder9.position.y = -9;
cylinder9.position.x = -45;
cylinder9.rotation.z = 0.05;

//Cylinder10
const cylinder10 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder10 );
cylinder10.position.z = -40;
cylinder10.position.y = -9;
cylinder10.position.x = -60;
cylinder10.rotation.z = -0.05;

//Cylinder11
const cylinder11 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder11 );
cylinder11.position.z = -40;
cylinder11.position.y = -9;
cylinder11.position.x = -75;
cylinder11.rotation.z = 0.1;

//Set mist
const mistSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/mist_texture.png');
const materialMist = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true,color:0xb3b3b3, opacity: 0.15, map: mistSprite } );
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


//Camera Pos
camera.position.z = 5.1;
camera.position.y = 2;
camera.position.x = -0.3;

//Light
const pointLight = new THREE.PointLight(0xFFFFFF);
pointLight.position.set(0,0,-5);
scene.add(pointLight);
//Setting variables
let camMove = false;
let a = -0.002;
//Moon light variables
let lMove = false;
let lMove2 = false;
let s = 0;
let s2 = 0;
//Grass variables
let gMove1 = false;
let gMove2 = true;
let gMove3 = false;
let gMove4 = true;
let gMove5 = true;
let gMove6 = false;
let gMove7 = true;
let gMove8 = false;


//Render scene
function animate() {
    requestAnimationFrame( animate );

    
    window.addEventListener("scroll", (event) => {
        let scroll = this.scrollY;
        camera.position.z = 5.1 + scroll/50;
        });



    //Camera movement
    if(camera.position.z < 4.3){camMove = true;}if(camera.position.z > 4.9){camMove = false;}
    if(camMove == true){camera.position.z += a;}if(camMove == false){camera.position.z += a;}
    if(camMove == true && a < 0.002){a += 0.000005;}
    if(camMove == false && a > -0.002){a -= 0.000005;}

    //Clouds movement
    cloud1.position.x += 0.01;
    if(cloud1.position.x >= 200){cloud1.position.x = -200}
    cloud2.position.x += 0.01;
    if(cloud2.position.x >= 200){cloud2.position.x = -200}
    cloud3.position.x += 0.01;
    if(cloud3.position.x >= 200){cloud3.position.x = -200}

    //Moon light scale
    s = Math.random()/10;
    s2 = Math.random()/10;
    if(light.position.z <= -86.01){lMove = true;}
    if(light.position.z >= -86){lMove = false;}
    if(lMove == true){light.position.z += s;light.position.x -= s;light.position.y += s;}
    if(lMove == false){light.position.z -= s;light.position.x += s;light.position.y -= s;}
    
    if(light2.position.z <= -84.01){lMove2 = true;}
    if(light2.position.z >= -84){lMove2 = false;}
    if(lMove2 == true){light2.position.z += s2;light2.position.x -= s2;light2.position.y += s2;}
    if(lMove2 == false){light2.position.z -= s2;light2.position.x += s2;light2.position.y -= s2;}

    //Mist1 move
    mist.position.x += 0.0025;
    if(mist.position.x > 27){mist.position.x =-27;}
    //Mist2 move
    mist2.position.x += 0.00125;
    if(mist2.position.x > 29){mist2.position.x =-29;}
    //Mist3 move
    mist3.position.x += 0.0005;
    if(mist3.position.x > 32){mist3.position.x =-32;}

    //Grass animation
    //Grass 1
    if(grass1.position.z < -29.05){gMove1 = true;}if(grass1.position.z > -28.95){gMove1 = false;}
    if(gMove1 == true){grass1.position.z += Math.random()/300;}if(gMove1 == false){grass1.position.z -= Math.random()/300;}
    //Grass 2
    if(grass2.position.z < -33.05){gMove2 = true;}if(grass2.position.z > -32.95){gMove2 = false;}
    if(gMove2 == true){grass2.position.z += Math.random()/300;}if(gMove2 == false){grass2.position.z -= Math.random()/300;}
    //Grass 3
    if(grass3.position.z < -37.05){gMove3 = true;}if(grass3.position.z > -36.95){gMove3 = false;}
    if(gMove3 == true){grass3.position.z += Math.random()/300;}if(gMove3 == false){grass3.position.z -= Math.random()/300;}
    //Grass 4
    if(grass4.position.z < -41.05){gMove4 = true;}if(grass4.position.z > -40.95){gMove4 = false;}
    if(gMove4 == true){grass4.position.z += Math.random()/300;}if(gMove4 == false){grass4.position.z -= Math.random()/300;}
    //Grass 5
    if(grass5.position.z < -12.55){gMove5 = true;}if(grass5.position.z > -12.45){gMove5 = false;}
    if(gMove5 == true){grass5.position.z += Math.random()/500;}if(gMove5 == false){grass5.position.z -= Math.random()/500;}
    //Grass 6
    if(grass6.position.z < -10.55){gMove6 = true;}if(grass6.position.z > -10.45){gMove6 = false;}
    if(gMove6 == true){grass6.position.z += Math.random()/500;}if(gMove6 == false){grass6.position.z -= Math.random()/500;}
    //Grass 7
    if(grass7.position.z < -8.55){gMove7 = true;}if(grass7.position.z > -8.45){gMove7 = false;}
    if(gMove7 == true){grass7.position.z += Math.random()/500;}if(gMove7 == false){grass7.position.z -= Math.random()/500;}
    //Grass 8
    if(grass8.position.z < -6.55){gMove8 = true;}if(grass8.position.z > -6.45){gMove8 = false;}
    if(gMove8 == true){grass8.position.z += Math.random()/500;}if(gMove8 == false){grass8.position.z -= Math.random()/500;}

    renderer.render( scene, camera );
}
animate();