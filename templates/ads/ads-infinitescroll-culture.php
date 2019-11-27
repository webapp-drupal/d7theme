<!-- Infinite Ad Serving on Culture Section -->


<script type='text/javascript'>
var leaderslot0;
var mpu1lot0;
var mpu2slot0;
var mpu3slot0;
var mpu4slot0;
var mpu5slot0;
var mpu6slot0;

var topslot1;
var topslot2;



 var nextSlotId = 0;
 function generateNextSlotName1() {
   var id = nextSlotId++;
   return 'leaderslot' + id;
 }
 function generateNextSlotName2() {
   var id = nextSlotId++;
   return 'mpu1lot' + id;
 }
  function generateNextSlotName3() {
   var id = nextSlotId++;
   return 'mpu2slot' + id;
 }
  function generateNextSlotName4() {
   var id = nextSlotId++;
   return 'mpu3slot' + id;
 }
  function generateNextSlotName5() {
   var id = nextSlotId++;
   return 'mpu4slot' + id;
 }
  function generateNextSlotName6() {
   var id = nextSlotId++;
   return 'mpu5slot' + id;
 }

  var j = 0;
  var k = 0;
  var l = 0;
  var m = 0;
  var n = 0;
  var o = 0;


  function moreContent1() {
   var slotName1 = generateNextSlotName1();
   var slotDiv = document.createElement('div');
   slotDiv.id = slotName1;
   document.getElementsByClassName('bottom-leaderboard-section')[j].appendChild(slotDiv);
   googletag.cmd.push(function() {
     var slot1 = googletag.defineSlot('/5269235/New_Statesman_2015_Dynamic_Bottom_Leaderboard', [728, 90], slotName1).
         setTargeting("Section", "culture").
         addService(googletag.pubads());
     googletag.display(slotName1);
     googletag.pubads().refresh([slot1]);
    });
     j += 1;
 }

   function moreContent2() {
   var slotName2 = generateNextSlotName2();
   var slotDiv = document.createElement('div');
   slotDiv.id = slotName2;
   document.getElementsByClassName('article-mpu-1')[k].appendChild(slotDiv);
   googletag.cmd.push(function() {
     var slot2 = googletag.defineSlot('/5269235/New_Statesman_2015_Dynamic_MPU_Top', [[300, 250], [300, 600], [300, 1050]], slotName2).
         setTargeting("Section", "culture").
         addService(googletag.pubads());
     googletag.display(slotName2);
     googletag.pubads().refresh([slot2]);
    });
     k += 1;
 }
   function moreContent3() {
   var slotName3 = generateNextSlotName3();
   var slotDiv = document.createElement('div');
   slotDiv.id = slotName3;
   document.getElementsByClassName('article-mpu-2')[l].appendChild(slotDiv);
   googletag.cmd.push(function() {
     var slot3 = googletag.defineSlot('/5269235/New_Statesman_2015_Dynamic_MPU_2', [[300, 250], [300, 600], [300, 1050]], slotName3).
         setTargeting("Section", "culture").
         addService(googletag.pubads());
     googletag.display(slotName3);
     googletag.pubads().refresh([slot3]);
    });
     l += 1;
 }
   function moreContent4() {
   var slotName4 = generateNextSlotName4();
   var slotDiv = document.createElement('div');
   slotDiv.id = slotName4;
   document.getElementsByClassName('article-mpu-3')[m].appendChild(slotDiv);
   googletag.cmd.push(function() {
     var slot4 = googletag.defineSlot('/5269235/New_Statesman_2015_Dynamic_MPU_3', [[300, 250], [300, 600], [300, 1050]], slotName4).
         setTargeting("Section", "culture").
         addService(googletag.pubads());
     googletag.display(slotName4);
     googletag.pubads().refresh([slot4]);
    });
     m += 1;
 }
   function moreContent5() {
   var slotName5 = generateNextSlotName5();
   var slotDiv = document.createElement('div');
   slotDiv.id = slotName5;
   document.getElementsByClassName('article-mpu-4')[n].appendChild(slotDiv);
   googletag.cmd.push(function() {
     var slot5 = googletag.defineSlot('/5269235/New_Statesman_2015_Mobile_MPU_3', [300, 250], slotName5).
         setTargeting("Section", "culture").
         addService(googletag.pubads());
     googletag.display(slotName5);
     googletag.pubads().refresh([slot5]);
    });
     n += 1;
 }
  function moreContent6() {
   var slotName6 = generateNextSlotName6();
   var slotDiv = document.createElement('div');
   slotDiv.id = slotName6;
   document.getElementsByClassName('article-mpu-5')[o].appendChild(slotDiv);
   googletag.cmd.push(function() {
     var slot6 = googletag.defineSlot('/5269235/New_Statesman_2015_Dynamic_In_Article_MPU_Replacement_1', [300, 250], slotName6).
         setTargeting("Section", "culture").
         addService(googletag.pubads());
     googletag.display(slotName6);
     googletag.pubads().refresh([slot6]);
    });
     o += 1;
 }

</script>