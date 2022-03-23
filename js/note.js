var cafePetitPont = {
    lat: 48.853270474173044,
    lng: 2.34680141570036,
    name: "cafepetitpont",
    p1: "05/paita_cafepetitpont",
    p2: "04/usk_cafepetitpont-scaled",
    coord1: '-5000.00,-2783.94,-4862.44'
};
var egliseStMedard = {
    lat: 48.8391589455749, 
    lng: 2.3500561311743415,
    name: "eglisestmedard",
    p1: "05/paita_eglisestmedard",
    p2: "04/usk_eglisestmedard-scaled",
    coord1: '-5000.00,-1256.98,228.08'
};
var grandPalais = {
    lat: 48.86301398465097,
    lng: 2.316530563411216,
    name: "grandpalais",
    p1: "05/paita_grandpalais-",
    p2: "05/paita_grandpalais-",
    coord1: '-1107.60,-1665.17,-5000.00'
};
var louvrePyramides = {
    lat: 48.86169896524472, 
    lng: 2.334681288707981,
    name: "louvrepyramides",
    p1: "05/paita_louvrepyramides",
    p2: "04/usk_louvrepyramides-scaled",
    coord1: '-3943.73,-1223.26,5000.00'
};
var notreDame = {
    lat: 48.850875729772405,
    lng: 2.35321546195698,
    name: "notredame",
    p1: "05/paita_notredame",
    p2: "05/paita_notredame",
    coord1: '-5000.00,-1242.11,-859.25'
};
var palaisRoyal = {
    lat: 48.863943879149794,
    lng: 2.3372070138226446,
    name: "palaisroyal",
    p1: "05/paita_palaisroyal",
    p2: "04/usk_palaisroyal-scaled",
    coord1: '-227.29,-2272.87,-5000.00'
};
var placeDauphine = {
    lat: 48.856547916788955,
    lng: 2.342509436915052,
    name: "placedauphine",
    p1: "05/paita_placedauphine",
    p2: "04/usk_placedauphine-scaled",
    coord1: '207.45,-596.13,-5000.00'
};
var placeFurstenberg = {
    lat: 48.85431991590883,
    lng: 2.3357365589945087,
    name: "placefurstenberg",
    p1: "05/paita_placefurstenberg",
    p2: "04/usk_placefurstenberg-scaled",
    coord1: '-681.86,-538.75,-5000.00'
};
var pontArcheveche = {
    lat: 48.85136661386947,
    lng: 2.3514503864678886,
    name: "pontarcheveche",
    p1: "05/paita_pontarchevecher",
    p2: "04/usk_pontarcheveche-scaled",
    coord1: '-5000.00,-1240.55,-986.87'
};
var pontMarie = {
    lat: 48.852287536067706,
    lng: 2.357639259582509,
    name: "pontmarie",
    p1: "05/paita_pontmarie",
    p2: "04/usk_pontmarie-scaled",
    coord1: '-5000.00,-2036.73,737.83'
};
var pontNeuf = {
    lat: 48.85839361258938, 
    lng: 2.337610053471593,
    name: "pontneuf",
    p1: "05/paita_pontneuf1",
    p11: "05/paita_pontneuf2",
    p2: "04/usk_pontneuf-scaled",
    coord1: '-844.92,-2372.25,-5000.00',
    coord2: '2020.08,-2728.97,-5000.00'
};
var sullyMorland = {
    lat: 48.85072087893228, 
    lng: 2.3613934134141923,
    name: "sullymorland",
    p1: "05/paita_sullymorland",
    p2: "04/usk_sullymorland",
    coord1: '5000.00,-3191.08,680.43'
};

if ($(window).width() > 480) {
    var map = L.map("map", {
        center: [48.85214995518537, 2.3400600567994783],
        zoom: 14
    });
} else {
    var map = L.map("map", {
        center: [48.85818299537591, 2.3401020332948073],
        zoom: 13
    });
}