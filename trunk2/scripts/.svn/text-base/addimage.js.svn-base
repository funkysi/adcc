/*global ni: true, numi: true, num: true, d: true, olddiv: true, document: true, divIdName: true, newdiv: true
*/

function addEvent() {

  ni = document.getElementById('myDiv');
  numi = document.getElementById('theValue');
  num = (document.getElementById("theValue").value -1)+ 2;
  numi.value = num;
  divIdName = "my"+num+"Div";
  newdiv = document.createElement('div');
  newdiv.setAttribute("id",divIdName);
  newdiv.innerHTML = "<label for=\"image"+num+"\">Image: </label><input id=\"image"+num+"\" type=\"file\" name=\"image"+num+"\" size=\"35\" /><br/> <label for=\"caption"+num+"\">Image Caption: </label><input id=\"caption"+num+"\" type=\"text\" name=\"title"+num+"\" size=\"40\" /><br/> <a href=\"javascript:;\" onclick=\"removeElement(\'"+divIdName+"\')\">Remove</a><?php $num="+num+";echo $num; ?>";
  ni.appendChild(newdiv);
}
 
function removeElement(divNum) {

  d = document.getElementById('myDiv');
  olddiv = document.getElementById(divNum);
  d.removeChild(olddiv);
}
/*members appendChild, createElement, getElementById, innerHTML, 
    removeChild, setAttribute, value
*/
