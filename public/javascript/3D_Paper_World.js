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
const backgroundImage = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/background.jpg');
scene.background = backgroundImage;

//Set black floor
const materialBlackFloor = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, color:0x000000 } );
const geometryBlackFloor = new THREE.PlaneGeometry( 60, 70 );
const geometryBlackFloor2 = new THREE.PlaneGeometry( 1200, 70 );
const blackFloor = new THREE.Mesh( geometryBlackFloor, materialBlackFloor );
const blackFloor2 = new THREE.Mesh( geometryBlackFloor2, materialBlackFloor );
scene.add( blackFloor );
blackFloor.rotation.x = 80;
blackFloor.position.y = 2;
blackFloor.position.z = 44;

scene.add( blackFloor2 );
blackFloor2.position.y = -40;

//Wall 1

const wallSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/wall_sprite.png');
const materialWall = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: wallSprite } );
const geometryWall = new THREE.PlaneGeometry( 60, 10 );
const Wall1 = new THREE.Mesh( geometryWall, materialWall );
scene.add( Wall1 );
Wall1.position.z = -21;
Wall1.position.y = -1;
Wall1.position.x = -32;
//Wall 1 under
const wallunderSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/wall2_sprite.png');
const materialWallunder = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: wallunderSprite } );
const Wall1under = new THREE.Mesh( geometryWall, materialWallunder );
scene.add( Wall1under );
Wall1under.position.z = -21;
Wall1under.position.y = -11;
Wall1under.position.x = -32;

//Wall 2
const Wall2 = new THREE.Mesh( geometryWall, materialWall );
scene.add( Wall2 );
Wall2.position.z = -21;
Wall2.position.y = -1;
Wall2.position.x = 32;
//wall2 under
const Wall2under = new THREE.Mesh( geometryWall, materialWallunder );
scene.add( Wall2under );
Wall2under.position.z = -21;
Wall2under.position.y = -11;
Wall2under.position.x = 32;

//Set cloud1
const cloudSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/cloud_sprite.png');
const materialCloud = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: cloudSprite } );
const geometryCloud1 = new THREE.PlaneGeometry( 12, 10 );
const cloud1 = new THREE.Mesh( geometryCloud1, materialCloud );
scene.add( cloud1 );
cloud1.position.z = -22;
cloud1.position.y = 12;
cloud1.position.x = -30;

//Set cloud2
const cloud2 = new THREE.Mesh( geometryCloud1, materialCloud );
scene.add( cloud2 );
cloud2.position.z = -22;
cloud2.position.y = 4;
cloud2.position.x = -10;

//Set cloud3
const cloud3 = new THREE.Mesh( geometryCloud1, materialCloud );
scene.add( cloud3 );
cloud3.position.z = -22;
cloud3.position.y = 4;
cloud3.position.x = 10;

//Set cloud4
const cloud4 = new THREE.Mesh( geometryCloud1, materialCloud );
scene.add( cloud4 );
cloud4.position.z = -22;
cloud4.position.y = 12;
cloud4.position.x = 30;

//Brick floor
const floorTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/bricks_sprite.jpg');
floorTexture.wrapS = THREE.RepeatWrapping;
floorTexture.wrapT = THREE.RepeatWrapping;
floorTexture.repeat.set( 8, 8 );
const geometryFloor = new THREE.PlaneGeometry( 50, 43 );
const materialFloor = new THREE.MeshStandardMaterial( { map: floorTexture } );
const brickFloor = new THREE.Mesh( geometryFloor, materialFloor );
scene.add( brickFloor );
brickFloor.rotation.x = 80;
brickFloor.position.y = -3.5;

//Grass floor Big
const grassfloorTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/grass_sprite.png');
grassfloorTexture.wrapS = THREE.RepeatWrapping;
grassfloorTexture.wrapT = THREE.RepeatWrapping;
grassfloorTexture.repeat.set( 16, 16 );
const geometrygrassFloorBig = new THREE.PlaneGeometry( 60, 35 );
const materialgrassFloorBig = new THREE.MeshStandardMaterial( { map: grassfloorTexture } );
const grassFloorBig = new THREE.Mesh( geometrygrassFloorBig, materialgrassFloorBig );
scene.add( grassFloorBig );
grassFloorBig.rotation.x = 80;
grassFloorBig.position.y = -2;
grassFloorBig.position.z = 13;


//Set house leftside
const house1Texture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/house1_sprite.jpg');
const house1RoofTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/roof_texture.jpg');
const materialhouse1 = new THREE.MeshStandardMaterial( { map: house1Texture } );
const materialRoofhouse1 = new THREE.MeshStandardMaterial( { map: house1RoofTexture } );
const geometryHouse1 = new THREE.BoxGeometry( 16, 10, 4 );

const points = [];
for ( let i = 0; i < 4; i ++ ) {
	points.push( new THREE.Vector2( Math.sin( i * 0.2 ) * 10 + 5, ( i - 5 ) * 2 ) );
}

const geometryroofHouse1 = new THREE.LatheGeometry( points );
const house1 = new THREE.Mesh( geometryHouse1, materialhouse1 );
const roof1 = new THREE.Mesh( geometryroofHouse1, materialRoofhouse1 );
scene.add( house1 );
house1.position.z = -16;
house1.position.y = 1;
house1.position.x = -14;
//Roof
scene.add( roof1 );
roof1.position.z = -19;
roof1.position.y = 1;
roof1.position.x = -14;
roof1.rotation.x = 179.1;
//Door
const doorSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/door_sprite.jpg');
const materialdoor = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: doorSprite } );
const geometrydoor = new THREE.PlaneGeometry( 3.5, 7 );
const door1 = new THREE.Mesh( geometrydoor, materialdoor );
scene.add( door1 );
door1.position.z = -14;
door1.position.y = -0.6;
door1.position.x = -14;

//Set house rightside
const house2Texture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/house2_sprite.jpg');
const materialhouse2 = new THREE.MeshStandardMaterial( { map: house2Texture } );
const materialRoofhouse2 = new THREE.MeshStandardMaterial( { map: house1RoofTexture } );
const geometryHouse2 = new THREE.BoxGeometry( 16, 10, 4 );

const geometryroofHouse2 = new THREE.LatheGeometry( points );
const roof2 = new THREE.Mesh( geometryroofHouse2, materialRoofhouse2 );

const house2 = new THREE.Mesh( geometryHouse2, materialhouse2 );
scene.add( house2 );
house2.position.z = -16;
house2.position.y = 1;
house2.position.x = 14;
//Roof2
scene.add( roof2 );
roof2.position.z = -19;
roof2.position.y = 1;
roof2.position.x = 14;
roof2.rotation.x = 179.1;
//Door2
const door2 = new THREE.Mesh( geometrydoor, materialdoor );
scene.add( door2 );
door2.position.z = -14;
door2.position.y = -0.6;
door2.position.x = 14;


//Grass floor leftside
const grassTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/grass_sprite.png');
grassTexture.wrapS = THREE.RepeatWrapping;
grassTexture.wrapT = THREE.RepeatWrapping;
grassTexture.repeat.set( 8, 6 );
const geometrygrassFloor = new THREE.PlaneGeometry( 20, 10 );
const materialgrassFloor = new THREE.MeshStandardMaterial( { map: grassTexture } );
const grassFloor = new THREE.Mesh( geometrygrassFloor, materialgrassFloor );
scene.add( grassFloor );
grassFloor.rotation.x = 80;
grassFloor.position.x = -14;
grassFloor.position.z = -16;
grassFloor.position.y = -4;

//Wall around grass left side
const whiteWallSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/white_sprite.png');
const geometryWhiteWall = new THREE.PlaneGeometry( 20, 2 );
const materialWhiteWall = new THREE.MeshBasicMaterial( { side: THREE.DoubleSide, map: whiteWallSprite } );
const whiteWall1 = new THREE.Mesh( geometryWhiteWall, materialWhiteWall );
scene.add( whiteWall1 );
whiteWall1.position.x = -14;
whiteWall1.position.z = -11.2;
whiteWall1.position.y = -4.5;

//Wall around grass left side 2
const geometryWhiteWall3 = new THREE.PlaneGeometry( 10, 2 );
const whiteWall3 = new THREE.Mesh( geometryWhiteWall3, materialWhiteWall );
scene.add( whiteWall3 );
whiteWall3.position.x = -4;
whiteWall3.position.z = -16.1;
whiteWall3.position.y = -5;
whiteWall3.rotation.y = 1.57;
whiteWall3.rotation.x = -0.1;

//Grass floor rightside
const grassFloor2 = new THREE.Mesh( geometrygrassFloor, materialgrassFloor );
scene.add( grassFloor2 );
grassFloor2.rotation.x = 80;
grassFloor2.position.x = 14;
grassFloor2.position.z = -16;
grassFloor2.position.y = -4;

//Wall around grass right side
const whiteWall2 = new THREE.Mesh( geometryWhiteWall, materialWhiteWall );
scene.add( whiteWall2 );
whiteWall2.position.x = 14;
whiteWall2.position.z = -11.2;
whiteWall2.position.y = -4.5;

//Wall around grass right side 2
const whiteWall4 = new THREE.Mesh( geometryWhiteWall3, materialWhiteWall );
scene.add( whiteWall4 );
whiteWall4.position.x = 4.01;
whiteWall4.position.z = -16.1;
whiteWall4.position.y = -5;
whiteWall4.rotation.y = 1.57;
whiteWall4.rotation.x = -0.1;

//Fence left side
const fenceTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/fence_sprite.png');
fenceTexture.wrapS = THREE.RepeatWrapping;
fenceTexture.wrapT = THREE.RepeatWrapping;
fenceTexture.repeat.set( 8, 1 );
const materialFence = new THREE.MeshStandardMaterial( { side: THREE.DoubleSide, transparent: true, map: fenceTexture } );
const geometryFence = new THREE.PlaneGeometry( 20, 3 );
const fence = new THREE.Mesh( geometryFence, materialFence );
scene.add( fence );
fence.position.x = -24;
fence.position.z = -14;
fence.position.y = -3.7;
fence.rotation.y = 1.57;
fence.rotation.x = -0.1;

//Fence right side
const fence2 = new THREE.Mesh( geometryFence, materialFence );
scene.add( fence2 );
fence2.position.x = 24;
fence2.position.z = -14;
fence2.position.y = -3.7;
fence2.rotation.y = 1.57;
fence2.rotation.x = -0.1;

//Block1
const block1Texture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/block_texture.png');
const materialblock1 = new THREE.MeshStandardMaterial( { map: block1Texture } );
const geometryblock1 = new THREE.BoxGeometry( 3, 3 );
const block1 = new THREE.Mesh( geometryblock1, materialblock1 );
scene.add( block1 );
block1.position.x = -20;
block1.position.z = -9;
block1.position.y = -2.7;

//Block2
const block2 = new THREE.Mesh( geometryblock1, materialblock1 );
scene.add( block2 );
block2.position.x = 20;
block2.position.z = -9;
block2.position.y = -2.7;

//Block3
const block3 = new THREE.Mesh( geometryblock1, materialblock1 );
scene.add( block3 );
block3.position.x = 17;
block3.position.z = -9;
block3.position.y = -2.7;

//Bush1
const bush1Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/bush1_sprite.png');
const materialBush1 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: bush1Sprite } );
const geometryBush1 = new THREE.PlaneGeometry( 3, 2 );
const bush1 = new THREE.Mesh( geometryBush1, materialBush1 );
scene.add( bush1 );
bush1.position.z = 0;
bush1.position.y = -2.2;
bush1.position.x = 0;

//Bush2
const bush2Sprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/bush2_sprite.png');
const materialBush2 = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: bush2Sprite } );
const geometryBush2 = new THREE.PlaneGeometry( 2, 3 );
const bush2 = new THREE.Mesh( geometryBush2, materialBush2 );
scene.add( bush2 );
bush2.position.z = -2;
bush2.position.y = -2;
bush2.position.x = 10;

//Bush3
const bush3 = new THREE.Mesh( geometryBush2, materialBush2 );
scene.add( bush3 );
bush3.position.z = -1;
bush3.position.y = -2;
bush3.position.x = -10;

//Bush4
const bush4 = new THREE.Mesh( geometryBush1, materialBush1 );
scene.add( bush4 );
bush4.position.z = 3;
bush4.position.y = -2;
bush4.position.x = -12;

//Bush5
const bush5 = new THREE.Mesh( geometryBush1, materialBush1 );
scene.add( bush5 );
bush5.position.z = 2;
bush5.position.y = -2;
bush5.position.x = 11;

//Fade to black
const fadeblackTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/paperworld/fade_to_black.png');

const geometryfadeblackFloorBig = new THREE.PlaneGeometry( 60, 12 );
const materialfadeblackFloorBig = new THREE.MeshBasicMaterial( {side: THREE.DoubleSide, transparent: true, map: fadeblackTexture } );

const fadeblackFloorBig = new THREE.Mesh( geometryfadeblackFloorBig, materialfadeblackFloorBig );
scene.add( fadeblackFloorBig );
fadeblackFloorBig.rotation.x = 80;
fadeblackFloorBig.position.y = -2;
fadeblackFloorBig.position.z = 9.5;

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

    renderer.render( scene, camera );
}
animate();