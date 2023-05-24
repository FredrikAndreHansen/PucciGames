//Creating scene
var URLROOT = getURLROOT();


const scene = new THREE.Scene();
const camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 0.1, 1000 );

const renderer = new THREE.WebGLRenderer();


container = document.getElementById('container3DAbout');
width = document.querySelector('#container3DAbout').offsetWidth;
height = document.querySelector('#container3DAbout').offsetHeight;
renderer.setPixelRatio( window.devicePixelRatio );
renderer.setSize(width, height);
container.appendChild(renderer.domElement);

//Allow to resize window
window.addEventListener( 'resize', onWindowResize, false );

function onWindowResize(){
	container = document.getElementById('container3DAbout');
	width = document.querySelector('#container3DAbout').offsetWidth;
	height = document.querySelector('#container3DAbout').offsetHeight;
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(width, height);
}

//Background
const backgroundImage = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/background.jpg');
scene.background = backgroundImage;

//Table
const tableTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/wood_texture.jpg');
const materialTable = new THREE.MeshStandardMaterial( { map: tableTexture } );
const geometryTable = new THREE.BoxGeometry( 20, 0.25, 10 );
const Table = new THREE.Mesh( geometryTable, materialTable );
scene.add( Table );
Table.position.z = -16;
Table.position.y = -2;
//Tablerug
const tablerugTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/rug2_texture.jpg');
const materialTablerug = new THREE.MeshStandardMaterial( { map: tablerugTexture } );
const geometryTablerug = new THREE.BoxGeometry( 18, 0.05, 9 );
const Tablerug = new THREE.Mesh( geometryTablerug, materialTablerug );
scene.add( Tablerug );
Tablerug.position.z = -16;
Tablerug.position.y = -1.89;
//Table legs
const cylinderTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/wood_texture.jpg');
const geometryCylinder = new THREE.CylinderGeometry( 0.3, 0.3, 8, 32 );
const materialCylider = new THREE.MeshBasicMaterial( {map: cylinderTexture} );
//Cylinder front left side
const cylinder1 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder1 );
cylinder1.position.x = -9;
cylinder1.position.z = -13;
cylinder1.position.y = -6;
cylinder1.rotation.z = -0.05;
//Cylinder front right side
const cylinder2 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder2 );
cylinder2.position.x = 9;
cylinder2.position.z = -13;
cylinder2.position.y = -6;
cylinder2.rotation.z = 0.05;
//Cylinder back left side
const cylinder3 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder3 );
cylinder3.position.x = -9;
cylinder3.position.z = -21;
cylinder3.position.y = -6;
cylinder3.rotation.z = -0.05;
//Cylinder back right side
const cylinder4 = new THREE.Mesh( geometryCylinder, materialCylider );
scene.add( cylinder4 );
cylinder4.position.x = 9;
cylinder4.position.z = -21;
cylinder4.position.y = -6;
cylinder4.rotation.z = 0.05;

//Monitor on table
//Bottom
const materialMonitor = new THREE.MeshStandardMaterial( { color: 0x111111 } );
const geometryMonitorbottom = new THREE.BoxGeometry( 5, 0.25, 2.5 );
const Monitorbottom = new THREE.Mesh( geometryMonitorbottom, materialMonitor );
scene.add( Monitorbottom );
Monitorbottom.position.z = -19;
Monitorbottom.position.y = -1.8;
//Middle
const geometryMonitormiddle = new THREE.BoxGeometry( 0.75, 1.5, 0.75 );
const Monitormiddle = new THREE.Mesh( geometryMonitormiddle, materialMonitor );
scene.add( Monitormiddle );
Monitormiddle.position.z = -19;
Monitormiddle.position.y = -0.9;
//Top
const geometryMonitortop = new THREE.BoxGeometry( 10, 5.5, 1 );
const Monitortop = new THREE.Mesh( geometryMonitortop, materialMonitor );
scene.add( Monitortop );
Monitortop.position.z = -19;
Monitortop.position.y = 2.5;
//Screen
const screenTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/screen_texture.png');
const materialscreen = new THREE.MeshBasicMaterial( { map: screenTexture } );
const geometryMonitorscreen = new THREE.BoxGeometry( 9, 4.75, 0.1 );
const Monitorscreen = new THREE.Mesh( geometryMonitorscreen, materialscreen );
scene.add( Monitorscreen );
Monitorscreen.position.z = -18.5;
Monitorscreen.position.y = 2.5;

//Keyboard on table
const geometryKeyboard = new THREE.BoxGeometry( 6, 0.25, 2.5 );
const Keyboard = new THREE.Mesh( geometryKeyboard, materialMonitor );
scene.add( Keyboard );
Keyboard.position.x = -4;
Keyboard.position.z = -14;
Keyboard.position.y = -1.8;
//Keyboard texture
const keyboardTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/keyboard_texture.jpg');
const materialkeyboard = new THREE.MeshBasicMaterial( { map: keyboardTexture } );
const geometryKeyboardtexture = new THREE.BoxGeometry( 6, 0.05, 2.5 );
const KeyboardTexture = new THREE.Mesh( geometryKeyboardtexture, materialkeyboard );
scene.add( KeyboardTexture );
KeyboardTexture.position.x = -4;
KeyboardTexture.position.z = -14;
KeyboardTexture.position.y = -1.65;

//Mousepad on table
const mousepadTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/brick_texture.jpg');
const materialmousepad = new THREE.MeshBasicMaterial( { map: mousepadTexture } );
const geometryKMousepad = new THREE.BoxGeometry( 5, 0.05, 4 );
const Mousepad = new THREE.Mesh( geometryKMousepad, materialmousepad );
scene.add( Mousepad );
Mousepad.position.x = 4;
Mousepad.position.z = -14;
Mousepad.position.y = -1.8;
//Mouse
const geometryMouse = new THREE.SphereGeometry( 0.5, 0.5, 6 );
const materialMouse = new THREE.MeshStandardMaterial( { color: 0x151515 } );
const Mouse = new THREE.Mesh( geometryMouse, materialMouse );
scene.add( Mouse );
Mouse.position.z = -14;
Mouse.position.x = 4.5;
Mouse.position.y = -1.7;
Mouse.rotation.y = -1.7;

//Computer
const geometryComputer = new THREE.BoxGeometry( 2.5, 6, 2.5 );
const Computer = new THREE.Mesh( geometryComputer, materialMonitor );
scene.add( Computer );
Computer.position.x = -6;
Computer.position.z = -20;
Computer.position.y = -7;
//Texture
const geometryComputertexture = new THREE.BoxGeometry( 2.5, 6, 0.1 );
const computerTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/computer_texture.png');
const materialcomputer = new THREE.MeshBasicMaterial( { map: computerTexture } );
const Computertexture = new THREE.Mesh( geometryComputertexture, materialcomputer );
scene.add( Computertexture );
Computertexture.position.x = -6;
Computertexture.position.z = -18.75;
Computertexture.position.y = -7;


//Floor
const floorTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/3p/wood_texture.jpg');
floorTexture.wrapS = THREE.RepeatWrapping;
floorTexture.wrapT = THREE.RepeatWrapping;
floorTexture.repeat.set( 8, 8 );
const materialFloor = new THREE.MeshStandardMaterial( { map: floorTexture } );
const geometryFloor = new THREE.BoxGeometry( 80, 0.1, 40 );
const Floor = new THREE.Mesh( geometryFloor, materialFloor );
scene.add( Floor );
Floor.position.z = -20;
Floor.position.y = -10;

//Wall
const m = new THREE.MeshStandardMaterial( { color: 0xFF8C00 } );
const wallTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/wall_texture.jpg');
wallTexture.wrapS = THREE.RepeatWrapping;
wallTexture.wrapT = THREE.RepeatWrapping;
wallTexture.repeat.set( 4, 4 );
const materialWall = new THREE.MeshStandardMaterial( { map: wallTexture } );
const geometryWall = new THREE.BoxGeometry( 0.1, 30, 40 );
//Wall left side
const Wall = new THREE.Mesh( geometryWall, materialWall );
scene.add( Wall );
Wall.position.x = -40;
Wall.position.z = -20;
Wall.position.y = 5;
//Wall right side
const Wall2 = new THREE.Mesh( geometryWall, materialWall );
scene.add( Wall2 );
Wall2.position.x = 40;
Wall2.position.z = -20;
Wall2.position.y = 5;

//Wall back side
const geometryWall2 = new THREE.BoxGeometry( 80, 30, 0.1 );
const Wall3 = new THREE.Mesh( geometryWall2, materialWall );
scene.add( Wall3 );
Wall3.position.x = 0;
Wall3.position.z = -40;
Wall3.position.y = 5;

//Roof
const roofTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/roof_texture.jpg');
roofTexture.wrapS = THREE.RepeatWrapping;
roofTexture.wrapT = THREE.RepeatWrapping;
roofTexture.repeat.set( 8, 8 );
const materialRoof = new THREE.MeshStandardMaterial( { map: roofTexture } );
const geometryRoof = new THREE.BoxGeometry( 80, 0.1, 40 );
const Roof = new THREE.Mesh( geometryRoof, materialRoof );
scene.add( Roof );
Roof.position.z = -20;
Roof.position.y = 20;

//Rug
const rugTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/rug_texture.jpg');
const materialRug = new THREE.MeshStandardMaterial( { map: rugTexture } );
const geometryRug = new THREE.BoxGeometry( 40, 0.075, 20 );
const Rug = new THREE.Mesh( geometryRug, materialRug );
scene.add( Rug );
Rug.position.z = -17;
Rug.position.y = -9.9;


//Door
const geometryDoor = new THREE.BoxGeometry( 13, 23, 0.1 );
const Door = new THREE.Mesh( geometryDoor, materialTable );
scene.add( Door );
Door.position.x = -28;
Door.position.z = -39.5;
Door.position.y = 1.5;
//Door knob
const geometryKnob = new THREE.SphereGeometry( 0.75, 0.5, 4 );
const materialKnob = new THREE.MeshStandardMaterial( { color: 0xDAA520 } );
const Knob = new THREE.Mesh( geometryKnob, materialKnob );
scene.add( Knob );
Knob.position.z = -39;
Knob.position.x = -24;
Knob.position.y = 1.5;

//Brick around door
const brickTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/brick_texture.jpg');
const materialBrick = new THREE.MeshStandardMaterial( { map: brickTexture } );
const geometryBrick = new THREE.BoxGeometry( 1, 23, 1 );
//Brick left side
const Brick1 = new THREE.Mesh( geometryBrick, materialBrick );
scene.add( Brick1 );
Brick1.position.x = -35;
Brick1.position.z = -39.9;
Brick1.position.y = 1.5;
//Brick right side
const Brick2 = new THREE.Mesh( geometryBrick, materialBrick );
scene.add( Brick2 );
Brick2.position.x = -22;
Brick2.position.z = -39.9;
Brick2.position.y = 1.5;
//Brick top
const geometryBrick2 = new THREE.BoxGeometry( 14, 1, 1 );
const Brick3 = new THREE.Mesh( geometryBrick2, materialBrick );
scene.add( Brick3 );
Brick3.position.x = -28.5;
Brick3.position.z = -39.9;
Brick3.position.y = 13;

//Picture
const pictureTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/picture.jpg');
const materialPicture = new THREE.MeshStandardMaterial( { map: pictureTexture } );
const geometryPicture = new THREE.BoxGeometry( 20, 14, 0.1 );
const Picture = new THREE.Mesh( geometryPicture, materialPicture );
scene.add( Picture );
Picture.position.x = 27;
Picture.position.z = -39.5;
Picture.position.y = 8;
//Frames around picture
const materialFrame = new THREE.MeshStandardMaterial( { color: 0xFFFFFF } );
const geometryFrame = new THREE.BoxGeometry( 0.75, 14, 0.1 );
//Frame left side
const Frame = new THREE.Mesh( geometryFrame, materialFrame );
scene.add( Frame );
Frame.position.x = 17;
Frame.position.z = -39.5;
Frame.position.y = 8;
//Frame right side
const Frame2 = new THREE.Mesh( geometryFrame, materialFrame );
scene.add( Frame2 );
Frame2.position.x = 37;
Frame2.position.z = -39.5;
Frame2.position.y = 8;
//Frame top
const geometryFrame2 = new THREE.BoxGeometry( 20.75, 0.75, 0.1 );
const Frame3 = new THREE.Mesh( geometryFrame2, materialFrame );
scene.add( Frame3 );
Frame3.position.x = 27;
Frame3.position.z = -39.5;
Frame3.position.y = 15;
//Frame bottom
const Frame4 = new THREE.Mesh( geometryFrame2, materialFrame );
scene.add( Frame4 );
Frame4.position.x = 27;
Frame4.position.z = -39.5;
Frame4.position.y = 1;
//Frame knob
const geometryframeKnob = new THREE.SphereGeometry( 0.5, 0.5, 4 );
const materialframeKnob = new THREE.MeshStandardMaterial( { color: 0x333333 } );
const frameKnob = new THREE.Mesh( geometryframeKnob, materialframeKnob );
scene.add( frameKnob );
frameKnob.position.z = -39;
frameKnob.position.x = 27;
frameKnob.position.y = 15.25;

//Electric input
const socketTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/sockets_sprite.png');
const geometryElectricalInput = new THREE.BoxGeometry( 3, 1, 1 );
const materialElectricalInput = new THREE.MeshStandardMaterial( { map: socketTexture } );
const ElectricalInput = new THREE.Mesh( geometryElectricalInput, materialElectricalInput );
scene.add( ElectricalInput );
ElectricalInput.position.z = -40;
ElectricalInput.position.x = -16;
ElectricalInput.position.y = -9;

//cable input left side
const geometryCableInput = new THREE.SphereGeometry( 0.8, 1, 8 );
const materialCableInput = new THREE.MeshStandardMaterial( { color: 0x000000 } );
const CableInput = new THREE.Mesh( geometryCableInput, materialCableInput );
scene.add( CableInput );
CableInput.position.z = -39;
CableInput.position.x = -16.55;
CableInput.position.y = -9.25;

//Cable, to wall
const geometryCable1 = new THREE.CylinderGeometry( 0.15, 0.15, 20, 16 );
const materialCable = new THREE.MeshStandardMaterial( { color: 0x000000 } );
const Cable1 = new THREE.Mesh( geometryCable1, materialCable );
scene.add( Cable1 );
Cable1.position.z = -28;
Cable1.position.x = -10.5;
Cable1.position.y = -8;
Cable1.rotation.z = 1.45;
Cable1.rotation.y = 8.4;

//cable input right side
const CableInput2 = new THREE.Mesh( geometryCableInput, materialCableInput );
scene.add( CableInput2 );
CableInput2.position.z = -39;
CableInput2.position.x = -15.05;
CableInput2.position.y = -9.25;

//Cable2, to wall
const geometryCable2 = new THREE.CylinderGeometry( 0.15, 0.15, 28, 16 );
const Cable2 = new THREE.Mesh( geometryCable2, materialCable );
scene.add( Cable2 );
Cable2.position.z = -28;
Cable2.position.x = -8;
Cable2.position.y = -6;
Cable2.rotation.z = 1.3;
Cable2.rotation.y = 8.4;

//Cable3, monitor to PC
const geometryCable3 = new THREE.CylinderGeometry( 0.075, 0.075, 14, 16 );
const Cable3 = new THREE.Mesh( geometryCable3, materialCable );
scene.add( Cable3 );
Cable3.position.z = -25;
Cable3.position.x = -4.5;
Cable3.position.y = -3.2;
Cable3.rotation.z = 1.1;
Cable3.rotation.y = 8.3;

//Cable4, Keyboard on table
const geometryCable4 = new THREE.CylinderGeometry( 0.075, 0.075, 6, 16 );
const Cable4 = new THREE.Mesh( geometryCable4, materialCable );
scene.add( Cable4 );
Cable4.position.z = -17;
Cable4.position.x = -4.5;
Cable4.position.y = -1.7;
Cable4.rotation.z = 1.58;
Cable4.rotation.y = 1.8;

//Cable5, Keyboard to PC
const geometryCable5 = new THREE.CylinderGeometry( 0.075, 0.075, 3, 16 );
const Cable5 = new THREE.Mesh( geometryCable5, materialCable );
scene.add( Cable5 );
Cable5.position.z = -21;
Cable5.position.x = -5.4;
Cable5.position.y = -3.3;
Cable5.rotation.y = 1.8;

//Cable6, mouse on table
const Cable6 = new THREE.Mesh( geometryCable4, materialCable );
scene.add( Cable6 );
Cable6.position.z = -17;
Cable6.position.x = 4;
Cable6.position.y = -1.7;
Cable6.rotation.z = 1.58;
Cable6.rotation.y = 1.8;

//Cable7, mouse to PC
const geometryCable7 = new THREE.CylinderGeometry( 0.075, 0.075, 9, 16 );
const Cable7 = new THREE.Mesh( geometryCable7, materialCable );
scene.add( Cable7 );
Cable7.position.z = -21;
Cable7.position.x = -0.7;
Cable7.position.y = -3.45;
Cable7.rotation.z = -1.2;

//Cup
const geometryCup = new THREE.CylinderGeometry( 0.6, 0.6, 1.5, 16 );
const materialCup = new THREE.MeshStandardMaterial( { color: 0xFFFFFF } );
const Cup = new THREE.Mesh( geometryCup, materialCup );
scene.add( Cup );
Cup.position.z = -16;
Cup.position.x = 8;
Cup.position.y = -1;

//Cup handle
const geometryCuphandle = new THREE.CylinderGeometry( 0.075, 0.075, 0.5, 16 );
const Cuphandle = new THREE.Mesh( geometryCuphandle, materialCup );
scene.add( Cuphandle );
Cuphandle.position.z = -16;
Cuphandle.position.x = 8.6;
Cuphandle.position.y = -0.7;
Cuphandle.rotation.z = 2;

//Cup handle2
const Cuphandle2 = new THREE.Mesh( geometryCuphandle, materialCup );
scene.add( Cuphandle2 );
Cuphandle2.position.z = -16;
Cuphandle2.position.x = 8.6;
Cuphandle2.position.y = -1.2;
Cuphandle2.rotation.z = -2;

//Cup handle3
const geometryCuphandle2 = new THREE.CylinderGeometry( 0.075, 0.075, 0.2, 16 );
const Cuphandle3 = new THREE.Mesh( geometryCuphandle2, materialCup );
scene.add( Cuphandle3 );
Cuphandle3.position.z = -16;
Cuphandle3.position.x = 8.9;
Cuphandle3.position.y = -0.6;
Cuphandle3.rotation.z = -2;

//Cup handle4
const Cuphandle4 = new THREE.Mesh( geometryCuphandle2, materialCup );
scene.add( Cuphandle4 );
Cuphandle4.position.z = -16;
Cuphandle4.position.x = 8.9;
Cuphandle4.position.y = -1.3;
Cuphandle4.rotation.z = 2;

//Cup handle5
const geometryCuphandle3 = new THREE.CylinderGeometry( 0.075, 0.075, 0.7, 16 );
const Cuphandle5 = new THREE.Mesh( geometryCuphandle3, materialCup );
scene.add( Cuphandle5 );
Cuphandle5.position.z = -16;
Cuphandle5.position.x = 9;
Cuphandle5.position.y = -0.95;

//Lamp1
const geometryLamp = new THREE.CylinderGeometry( 1, 1, 0.1, 16 );
const materialLamp = new THREE.MeshStandardMaterial( { color: 0x808080 } );
const Lamp1 = new THREE.Mesh( geometryLamp, materialLamp );
scene.add( Lamp1 );
Lamp1.position.z = -30;
Lamp1.position.x = -20;
Lamp1.position.y = 20;
const geometryInsideLamp = new THREE.CylinderGeometry( 0.75, 0.75, 0.1, 16 );
const materialInsideLamp = new THREE.MeshStandardMaterial( { color: 0xFFFFFF } );
const insideLamp1 = new THREE.Mesh( geometryInsideLamp, materialInsideLamp );
scene.add( insideLamp1 );
insideLamp1.position.z = -30;
insideLamp1.position.x = -20;
insideLamp1.position.y = 19.99;
//Lamp1 Light
const lightSprite = new THREE.TextureLoader().load(URLROOT + 'public/graphic/index/light_sprite.png');
const geometryLight = new THREE.PlaneGeometry( 24.35, 24 );
const materialLight = new THREE.MeshBasicMaterial( { blending: THREE.CustomBlending, blendEquation: THREE.AddEquation, blendSrc: THREE.SrcAlphaFactor,
    blendSrc: THREE.OneFactor, blendDst: THREE.OneMinusSrcAlphaFactor, side: THREE.DoubleSide, transparent: true,color:0x808080, opacity: 0.01, map: lightSprite } );

const geometryLight2 = new THREE.PlaneGeometry( 16.35, 16 );
const materialLight2 = new THREE.MeshBasicMaterial( { blending: THREE.CustomBlending, blendEquation: THREE.AddEquation, blendSrc: THREE.SrcAlphaFactor,
    blendSrc: THREE.OneFactor, blendDst: THREE.OneMinusSrcAlphaFactor, side: THREE.DoubleSide, transparent: true,color:0x404040, opacity: 0.01, map: lightSprite } );

const light = new THREE.Mesh( geometryLight, materialLight );
scene.add( light );
light.position.z = -30;
light.position.x = -20;
light.position.y = 19.9;
light.rotation.x = 1.57;

const light2 = new THREE.Mesh( geometryLight2, materialLight2 );
scene.add( light2 );
light2.position.z = -30;
light2.position.x = -20;
light2.position.y = 19.89;
light2.rotation.x = 1.57;

//Lamp2
const Lamp2 = new THREE.Mesh( geometryLamp, materialLamp );
scene.add( Lamp2 );
Lamp2.position.z = -30;
Lamp2.position.x = 20;
Lamp2.position.y = 20;

const insideLamp2 = new THREE.Mesh( geometryInsideLamp, materialInsideLamp );
scene.add( insideLamp2 );
insideLamp2.position.z = -30;
insideLamp2.position.x = 20;
insideLamp2.position.y = 19.99;

const light3 = new THREE.Mesh( geometryLight, materialLight );
scene.add( light3 );
light3.position.z = -30;
light3.position.x = 20;
light3.position.y = 19.9;
light3.rotation.x = 1.57;

const light4 = new THREE.Mesh( geometryLight2, materialLight2 );
scene.add( light4 );
light4.position.z = -30;
light4.position.x = 20;
light4.position.y = 19.89;
light4.rotation.x = 1.57;

//Lamp3
const Lamp3 = new THREE.Mesh( geometryLamp, materialLamp );
scene.add( Lamp3 );
Lamp3.position.z = -12;
Lamp3.position.x = -20;
Lamp3.position.y = 20;

const insideLamp3 = new THREE.Mesh( geometryInsideLamp, materialInsideLamp );
scene.add( insideLamp3 );
insideLamp3.position.z = -12;
insideLamp3.position.x = -20;
insideLamp3.position.y = 19.99;

const light5 = new THREE.Mesh( geometryLight, materialLight );
scene.add( light5 );
light5.position.z = -12;
light5.position.x = -20;
light5.position.y = 19.9;
light5.rotation.x = 1.57;

const light6 = new THREE.Mesh( geometryLight2, materialLight2 );
scene.add( light6 );
light6.position.z = -12;
light6.position.x = -20;
light6.position.y = 19.89;
light6.rotation.x = 1.57;

//Lamp4
const Lamp4 = new THREE.Mesh( geometryLamp, materialLamp );
scene.add( Lamp4 );
Lamp4.position.z = -12;
Lamp4.position.x = 20;
Lamp4.position.y = 20;

const insideLamp4 = new THREE.Mesh( geometryInsideLamp, materialInsideLamp );
scene.add( insideLamp4 );
insideLamp4.position.z = -12;
insideLamp4.position.x = 20;
insideLamp4.position.y = 19.99;

const light7 = new THREE.Mesh( geometryLight, materialLight );
scene.add( light7 );
light7.position.z = -12;
light7.position.x = 20;
light7.position.y = 19.9;
light7.rotation.x = 1.57;

const light8 = new THREE.Mesh( geometryLight2, materialLight2 );
scene.add( light8 );
light8.position.z = -12;
light8.position.x = 20;
light8.position.y = 19.89;
light8.rotation.x = 1.57;

//Shelf
const materialShelf = new THREE.MeshStandardMaterial( { map: cylinderTexture } );
const geometryShelf = new THREE.BoxGeometry( 4, 12, 12 );
//Shelf1
const Shelf1 = new THREE.Mesh( geometryShelf, materialShelf );
scene.add( Shelf1 );
Shelf1.position.x = 38;
Shelf1.position.z = -30;
Shelf1.position.y = -5;
//Top
const geometryShelfTop = new THREE.BoxGeometry( 5, 0.5, 13 );
const Shelf1Top = new THREE.Mesh( geometryShelfTop, materialShelf );
scene.add( Shelf1Top );
Shelf1Top.position.x = 38;
Shelf1Top.position.z = -30;
Shelf1Top.position.y = 1;
//Drawers
const geometryShelfDrawer = new THREE.BoxGeometry( 4, 0.1, 11.9 );
const materialDrawer = new THREE.MeshStandardMaterial( { color: 0x000000, transparent: true, opacity: 0.75 } );
const ShelfDrawer1 = new THREE.Mesh( geometryShelfDrawer, materialDrawer );
scene.add( ShelfDrawer1 );
ShelfDrawer1.position.x = 37.9;
ShelfDrawer1.position.z = -30;
ShelfDrawer1.position.y = -2.5;
//Drawer2
const ShelfDrawer2 = new THREE.Mesh( geometryShelfDrawer, materialDrawer );
scene.add( ShelfDrawer2 );
ShelfDrawer2.position.x = 37.9;
ShelfDrawer2.position.z = -30;
ShelfDrawer2.position.y = -6.5;
//Drawer knobs
const geometryDrawerKnob = new THREE.SphereGeometry( 0.25, 0.25, 8 );
const materialDrawerKnob = new THREE.MeshStandardMaterial( { color: 0xFFFF00 } );
const DrawerKnob1 = new THREE.Mesh( geometryDrawerKnob, materialDrawerKnob );
scene.add( DrawerKnob1 );
DrawerKnob1.position.x = 36;
DrawerKnob1.position.z = -30;
DrawerKnob1.position.y = 0.5;
//Knob2
const DrawerKnob2 = new THREE.Mesh( geometryDrawerKnob, materialDrawerKnob );
scene.add( DrawerKnob2 );
DrawerKnob2.position.x = 36;
DrawerKnob2.position.z = -30;
DrawerKnob2.position.y = -3;
//Knob3
const DrawerKnob3 = new THREE.Mesh( geometryDrawerKnob, materialDrawerKnob );
scene.add( DrawerKnob3 );
DrawerKnob3.position.x = 36;
DrawerKnob3.position.z = -30;
DrawerKnob3.position.y = -7;

//Book Shelf
const materialBookShelf = new THREE.MeshStandardMaterial( { color: 0xFFFFFF } );
const geometryBookShelf = new THREE.BoxGeometry( 5, 0.5, 12 );
//Shelf1
const Bookshelf = new THREE.Mesh( geometryBookShelf, materialBookShelf );
scene.add( Bookshelf );
Bookshelf.position.x = 38;
Bookshelf.position.z = -30;
Bookshelf.position.y = 8;

//Books
//Book1
const materialBook1 = new THREE.MeshStandardMaterial( { color: 0xA52A2A } );
const geometryBook = new THREE.BoxGeometry( 2, 4.5, 0.5 );

const Book1 = new THREE.Mesh( geometryBook, materialBook1 );
scene.add( Book1 );
Book1.position.x = 38;
Book1.position.z = -35;
Book1.position.y = 10.5;

//Book2
const materialBook2 = new THREE.MeshStandardMaterial( { color: 0xFAEBD7 } );
const Book2 = new THREE.Mesh( geometryBook, materialBook2 );
scene.add( Book2 );
Book2.position.x = 38;
Book2.position.z = -34.2;
Book2.position.y = 10.5;

//Book3
const materialBook3 = new THREE.MeshStandardMaterial( { color: 0x5F9EA0 } );
const Book3 = new THREE.Mesh( geometryBook, materialBook3 );
scene.add( Book3 );
Book3.position.x = 38;
Book3.position.z = -33.4;
Book3.position.y = 10.5;

//Book4
const materialBook4 = new THREE.MeshStandardMaterial( { color: 0xD2691E } );
const Book4 = new THREE.Mesh( geometryBook, materialBook4 );
scene.add( Book4 );
Book4.position.x = 38;
Book4.position.z = -32.6;
Book4.position.y = 10.5;

//Book5
const materialBook5 = new THREE.MeshStandardMaterial( { color: 0x556B2F } );
const Book5 = new THREE.Mesh( geometryBook, materialBook5 );
scene.add( Book5 );
Book5.position.x = 38;
Book5.position.z = -31.8;
Book5.position.y = 10.5;

//Book6
const materialBook6 = new THREE.MeshStandardMaterial( { color: 0x483D8B } );
const Book6 = new THREE.Mesh( geometryBook, materialBook6 );
scene.add( Book6 );
Book6.position.x = 38;
Book6.position.z = -31;
Book6.position.y = 10.5;

//Book7
const materialBook7 = new THREE.MeshStandardMaterial( { color: 0xDCDCDC } );
const Book7 = new THREE.Mesh( geometryBook, materialBook7 );
scene.add( Book7 );
Book7.position.x = 38;
Book7.position.z = -30.2;
Book7.position.y = 10.5;

//Book8
const materialBook8 = new THREE.MeshStandardMaterial( { color: 0xB22222 } );
const Book8 = new THREE.Mesh( geometryBook, materialBook8 );
scene.add( Book8 );
Book8.position.x = 38;
Book8.position.z = -29.4;
Book8.position.y = 10.5;

//Book9
const materialBook9 = new THREE.MeshStandardMaterial( { color: 0x32CD32 } );
const Book9 = new THREE.Mesh( geometryBook, materialBook9 );
scene.add( Book9 );
Book9.position.x = 38;
Book9.position.z = -28.6;
Book9.position.y = 10.5;

//Book10
const materialBook10 = new THREE.MeshStandardMaterial( { color: 0x191970 } );
const Book10 = new THREE.Mesh( geometryBook, materialBook10 );
scene.add( Book10 );
Book10.position.x = 38;
Book10.position.z = -27.8;
Book10.position.y = 10.5;

//Book11
const materialBook11 = new THREE.MeshStandardMaterial( { color: 0x4169E1 } );
const Book11 = new THREE.Mesh( geometryBook, materialBook11 );
scene.add( Book11 );
Book11.position.x = 38;
Book11.position.z = -27;
Book11.position.y = 10.5;

//Book12
const materialBook12 = new THREE.MeshStandardMaterial( { color: 0xF4A460 } );
const Book12 = new THREE.Mesh( geometryBook, materialBook12 );
scene.add( Book12 );
Book12.position.x = 38;
Book12.position.z = -26.2;
Book12.position.y = 10.5;

//Flowerpot
const geometryFlowerpot = new THREE.CylinderGeometry( 1, 1, 2, 16 );
const materialFlowerpot = new THREE.MeshStandardMaterial( { color: 0xFFFFFF } );
const Flowerpot = new THREE.Mesh( geometryFlowerpot, materialFlowerpot );
scene.add( Flowerpot );
Flowerpot.position.x = 37;
Flowerpot.position.z = -29;
Flowerpot.position.y = 2;
//Top
const geometryFlowerpotTop = new THREE.CylinderGeometry( 1.25, 1.25, 0.25, 16 );
const FlowerpotTop = new THREE.Mesh( geometryFlowerpotTop, materialFlowerpot );
scene.add( FlowerpotTop );
FlowerpotTop.position.x = 37;
FlowerpotTop.position.z = -29;
FlowerpotTop.position.y = 3;

//Flowerstick
const geometryFlowerstick = new THREE.CylinderGeometry( 0.15, 0.15, 2, 16 );
const materialFlowerstick = new THREE.MeshStandardMaterial( { color: 0xA0522D } );
const FlowerStick = new THREE.Mesh( geometryFlowerstick, materialFlowerstick );
scene.add( FlowerStick );
FlowerStick.position.x = 37;
FlowerStick.position.z = -29;
FlowerStick.position.y = 3.5;

const geometryFlower = new THREE.SphereGeometry( 1, 1, 6 );
const materialFlower = new THREE.MeshStandardMaterial( { color: 0x2E8B57 } );
const Flower = new THREE.Mesh( geometryFlower, materialFlower );
scene.add( Flower );
Flower.position.x = 37;
Flower.position.z = -29;
Flower.position.y = 5;

//Picture on wall left side
const picture2Texture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/picture2.jpg');
const materialPictureLeftside = new THREE.MeshStandardMaterial( { map: picture2Texture } );
const geometryPictureleftside = new THREE.BoxGeometry( 0.01, 10, 6 );
//Picture
const Pictureleftside = new THREE.Mesh( geometryPictureleftside, materialPictureLeftside );
scene.add( Pictureleftside );
Pictureleftside.position.x = -38;
Pictureleftside.position.z = -30;
Pictureleftside.position.y = 8;

//Frames left/right
const geometryFramePictureleftside = new THREE.BoxGeometry( 0.1, 10, 0.25 );
//Frame1
const FramePictureleftside = new THREE.Mesh( geometryFramePictureleftside, materialFlowerpot );
scene.add( FramePictureleftside );
FramePictureleftside.position.x = -38;
FramePictureleftside.position.z = -33;
FramePictureleftside.position.y = 8;
//Frame2
const FramePictureleftside2 = new THREE.Mesh( geometryFramePictureleftside, materialFlowerpot );
scene.add( FramePictureleftside2 );
FramePictureleftside2.position.x = -38;
FramePictureleftside2.position.z = -27;
FramePictureleftside2.position.y = 8;

//Frames top/bottom
const geometryFramePictureleftsideTop = new THREE.BoxGeometry( 0.1, 0.25, 6 );
//Frame3
const FramePictureleftside3 = new THREE.Mesh( geometryFramePictureleftsideTop, materialFlowerpot );
scene.add( FramePictureleftside3 );
FramePictureleftside3.position.x = -38;
FramePictureleftside3.position.z = -30;
FramePictureleftside3.position.y = 3.1;
//Frame4
const FramePictureleftside4 = new THREE.Mesh( geometryFramePictureleftsideTop, materialFlowerpot );
scene.add( FramePictureleftside4 );
FramePictureleftside4.position.x = -38;
FramePictureleftside4.position.z = -30;
FramePictureleftside4.position.y = 12.89;

//Frameknob
const geometryFrameknob2 = new THREE.SphereGeometry( 0.25, 0.25, 6 );
const FrameKnob2 = new THREE.Mesh( geometryFrameknob2, materialCable );
scene.add( FrameKnob2 );
FrameKnob2.position.x = -38;
FrameKnob2.position.z = -30;
FrameKnob2.position.y = 13;

//Coach
const materialcoachbackseat = new THREE.MeshStandardMaterial( { color: 0x8B0000 } );
const coachTexture3 = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/wall_texture.jpg');
const materialbottomcoach = new THREE.MeshStandardMaterial( { map: coachTexture3 } );
const geometrybottomcoach = new THREE.BoxGeometry( 10, 3, 16 );
const Bottomcoach = new THREE.Mesh( geometrybottomcoach, materialcoachbackseat );
scene.add( Bottomcoach );
Bottomcoach.position.x = -34;
Bottomcoach.position.z = -10;
Bottomcoach.position.y = -7;

//Coach seat
//const coachTexture = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/coach_texture.png');
const materialcoachseat = new THREE.MeshStandardMaterial( { color: 0xFF8C00 } );
const geometrycoachseat = new THREE.BoxGeometry( 10, 1, 14 );
const Coachseat = new THREE.Mesh( geometrycoachseat, materialcoachseat );
scene.add( Coachseat );
Coachseat.position.x = -33;
Coachseat.position.z = -10;
Coachseat.position.y = -5;

//Coach backseat
//const coachTexture2 = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/roof_texture.jpg');
const geometrycoachbackseat = new THREE.BoxGeometry( 1, 7, 15 );
const Coachbackseat = new THREE.Mesh( geometrycoachbackseat, materialcoachbackseat );
scene.add( Coachbackseat );
Coachbackseat.position.x = -38;
Coachbackseat.position.z = -10;
Coachbackseat.position.y = -2;


//Coach sideseat
const materialcoachsideseat = new THREE.MeshStandardMaterial( { color: 0x00FF00 } );
const geometrycoachsideseat = new THREE.BoxGeometry( 10, 3, 1 );
const Coachsideseat = new THREE.Mesh( geometrycoachsideseat, materialcoachbackseat );
scene.add( Coachsideseat );
Coachsideseat.position.x = -34;
Coachsideseat.position.z = -2.5;
Coachsideseat.position.y = -4;

//Coach sideseat2
const Coachsideseat2 = new THREE.Mesh( geometrycoachsideseat, materialcoachbackseat );
scene.add( Coachsideseat2 );
Coachsideseat2.position.x = -34;
Coachsideseat2.position.z = -17.5;
Coachsideseat2.position.y = -4;

//Coach foot
const geometrycoachfoot = new THREE.BoxGeometry( 1, 2, 1 );
const coachfoot1 = new THREE.Mesh( geometrycoachfoot, materialShelf );
scene.add( coachfoot1 );
coachfoot1.position.x = -30;
coachfoot1.position.z = -2.55;
coachfoot1.position.y = -9;
//Coach foot2
const coachfoot2 = new THREE.Mesh( geometrycoachfoot, materialShelf );
scene.add( coachfoot2 );
coachfoot2.position.x = -38;
coachfoot2.position.z = -2.55;
coachfoot2.position.y = -9;

//Coach foot3
const coachfoot3 = new THREE.Mesh( geometrycoachfoot, materialShelf );
scene.add( coachfoot3 );
coachfoot3.position.x = -30;
coachfoot3.position.z = -17;
coachfoot3.position.y = -9;

//Picture3
const geometryPicture3 = new THREE.CylinderGeometry( 3.5, 3.5, 0.1, 32 );
const coachTexture25 = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/picture3.jpg');
const materialPicture3 = new THREE.MeshStandardMaterial( { map: coachTexture25 } );
const Picture3 = new THREE.Mesh( geometryPicture3, materialPicture3 );
scene.add( Picture3 );
Picture3.position.z = -15;
Picture3.position.x = -39;
Picture3.position.y = 10;
Picture3.rotation.z = 1.5;
//Frame
const geometryPicture3Frame = new THREE.CylinderGeometry( 3.75, 3.75, 0.1, 32 );
const Picture3Frame = new THREE.Mesh( geometryPicture3Frame, materialInsideLamp );
scene.add( Picture3Frame );
Picture3Frame.position.z = -15;
Picture3Frame.position.x = -39.01;
Picture3Frame.position.y = 10;
Picture3Frame.rotation.z = 1.5;
//Frameknob
const FrameKnob3 = new THREE.Mesh( geometryFrameknob2, materialCable );
scene.add( FrameKnob3 );
FrameKnob3.position.x = -38.8;
FrameKnob3.position.z = -15;
FrameKnob3.position.y = 13.7;

//Picture4
const coachTexture26 = new THREE.TextureLoader().load(URLROOT + 'public/graphic/about/picture4.jpg');
const materialPicture4 = new THREE.MeshStandardMaterial( { map: coachTexture26 } );
const Picture4 = new THREE.Mesh( geometryPicture3, materialPicture4 );
scene.add( Picture4 );
Picture4.position.z = -5;
Picture4.position.x = -39;
Picture4.position.y = 10;
Picture4.rotation.z = 1.5;
//Frame
const Picture4Frame = new THREE.Mesh( geometryPicture3Frame, materialInsideLamp );
scene.add( Picture4Frame );
Picture4Frame.position.z = -5;
Picture4Frame.position.x = -39.01;
Picture4Frame.position.y = 10;
Picture4Frame.rotation.z = 1.5;
//Frameknob
const FrameKnob4 = new THREE.Mesh( geometryFrameknob2, materialCable );
scene.add( FrameKnob4 );
FrameKnob4.position.x = -38.8;
FrameKnob4.position.z = -5;
FrameKnob4.position.y = 13.7;

//Thrashcan
const geometryThrashcan = new THREE.CylinderGeometry( 2, 2, 6, 16 );
const materialThrashcan = new THREE.MeshStandardMaterial( { color: 0x778899 } );
const Thrashcan = new THREE.Mesh( geometryThrashcan, materialThrashcan );
scene.add( Thrashcan );
Thrashcan.position.x = 37;
Thrashcan.position.z = -4;
Thrashcan.position.y = -7;
//Thrashcan Top part
const geometryThrashcanTop = new THREE.CylinderGeometry( 2.25, 2.25, 1, 16 );
const materialThrashcanTop = new THREE.MeshStandardMaterial( { color: 0x000000 } );
const ThrashcanTop = new THREE.Mesh( geometryThrashcanTop, materialThrashcanTop );
scene.add( ThrashcanTop );
ThrashcanTop.position.x = 37;
ThrashcanTop.position.z = -4;
ThrashcanTop.position.y = -4;
//Bottom
const geometryThrashcanBottom = new THREE.SphereGeometry( 0.5, 0.5, 6 );
const materialThrashcanBottom = new THREE.MeshStandardMaterial( { color: 0x806c00 } );
const ThrashcanBottom = new THREE.Mesh( geometryThrashcanBottom, materialThrashcanBottom );
scene.add( ThrashcanBottom );
ThrashcanBottom.position.x = 35;
ThrashcanBottom.position.z = -4;
ThrashcanBottom.position.y = -9.75;

//TV
const geometryTV = new THREE.BoxGeometry( 0.25, 10, 12 );
const materialTV = new THREE.MeshStandardMaterial( { color: 0x000000 } );
const TV = new THREE.Mesh( geometryTV, materialTV );
scene.add( TV );
TV.position.x = 39.5;
TV.position.z = -8;
TV.position.y = 7;
//TV screen
const geometryTVScreen = new THREE.BoxGeometry( 0.25, 9, 11 );
const materialTVScreen = new THREE.MeshStandardMaterial( { color: 0x061014 } );
const TVScreen = new THREE.Mesh( geometryTVScreen, materialTVScreen );
scene.add( TVScreen );
TVScreen.position.x = 39.49;
TVScreen.position.z = -8;
TVScreen.position.y = 7;

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

//Camera Pos
camera.position.z = 5.1;
camera.position.y = 2;
camera.position.x = 0;

//Light
const pointLight = new THREE.PointLight(0xFFFFFF);
pointLight.position.set(0,5,15); //0,0,-5
scene.add(pointLight);
//Setting variables
var camMove = false;
var a = -0.002;



//Render scene
function animate() {
    requestAnimationFrame( animate );

    window.addEventListener("scroll", (event) => {
        let scroll = this.scrollY;
        camera.position.z = 5.1 + scroll/50;
        mist.position.z = 2.51 + scroll/50;
        mist2.position.z = 2 + scroll/50;
        mist3.position.z = 1.5 + scroll/50;
        });

    //Light move
    light.rotation.z += 1;
    light2.rotation.z -= 1;
    light3.rotation.z += 1;
    light4.rotation.z -= 1;
    light5.rotation.z += 1;
    light6.rotation.z -= 1;
    light7.rotation.z += 1;
    light8.rotation.z -= 1;

    //Mist1 move
    mist.position.x += 0.0025;
    if(mist.position.x > 15){mist.position.x =-15;}
    //Mist2 move
    mist2.position.x += 0.00125;
    if(mist2.position.x > 15){mist2.position.x =-15;}
    //Mist3 move
    mist3.position.x += 0.0005;
    if(mist3.position.x > 15){mist3.position.x =-15;}

    //Camera movement
    if(camera.position.y < 1.7){camMove = true;}if(camera.position.y > 2.3){camMove = false;}
    if(camMove == true){camera.position.y += a;}if(camMove == false){camera.position.y += a;}
    if(camMove == true && a < 0.002){a += 0.000005;}
    if(camMove == false && a > -0.002){a -= 0.000005;}


    renderer.render( scene, camera );
}
animate();