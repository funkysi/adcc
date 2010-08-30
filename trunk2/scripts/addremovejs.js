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
  newdiv.innerHTML = "<label for=\"text\">Main Text: </label><textarea id=\"text2\" cols=\"50\" rows=\"10\" name=\"text2\" ></textarea><br/> <label for=\"image\">Image: </label><input id=\"image\" type=\"file\" name=\"image\" size=\"35\" /><br/> <label for=\"caption\">Image Caption: </label><input id=\"caption\" type=\"text\" name=\"title\" size=\"40\" /><br/> <label for=\"link\">Link Url: </label><input id=\"link\" type=\"text\" name=\"link\" size=\"40\" /><br/> <a href=\"javascript:;\" onclick=\"removeElement(\'"+divIdName+"\')\">Remove</a>";
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
