/* The addNewStyleSheetByFullCSS function accepts one argument,
 the full CSS to be used within the style sheet, and the new
 style sheet is appended to the DOM tree automatically. */

function addNewStyleSheetByFullCSS(innerCSS){
  var h=document.getElementsByTagName("head");if(!h.length)return;
  var newStyleSheet=document.createElement("style");
  newStyleSheet.type="text/css";
  h[0].appendChild(newStyleSheet);
  try{
    newStyleSheet.styleSheet.cssText=innerCSS;
  }catch(e){try{
    newStyleSheet.appendChild(document.createTextNode(innerCSS));
    newStyleSheet.innerHTML=innerCSS;
  }catch(e){}}
}

// ============

var fullCSS=''+
'\nbody { margin: 5px 5px 5px 5px; padding: 0; background-color: #FFFFFF; color: #000000; text-decoration: none; font-family:aril,helvetica; font-size:15pt;}'+
'\ntr { vertical-align: top;  }'+
'\n.fieldframe { background-color: #F1F2F6; color: #929BAB; border: 1px solid #929BAB; padding: 5px }'+
'\n.buttonframe { background-color: #F1F2F6; color: #929BAB; margin-top: 10px; border: 1px solid #929BAB; padding: 5px }'+
'\n.field { background-color: #E3E4EA; color: #000000; border: 1px solid #929BAB;}'+
'\n.label { background-color: #E3E4EA; color: #000000; vertical-align: top; text-decoration: none; border:0px solid #929BAB; font-family:arial,helvetica; font-size:8pt;}'+
'\n.binfo { background-color: #E3E4EA; color: #000000; vertical-align: top; text-decoration: none; border:0px solid #929BAB; font-family:arial,helvetica; font-size:8pt;}'+
'\n.nlabel { background-color: #FFFFFF; color: #000000; vertical-align: top; text-decoration: none; border:0px solid #929BAB; font-family:arial,helvetica; font-size:10pt;}'+
'\n.input { background-color: #F1F2F6; color: #5D636E; vertical-align: top;'+
'\nwidth: 80px; border:1px solid #929BAB; padding:2px;'+
'\n}'+
'\n.input input{'+
'\nbackground-color: white; color: black; border:0 none;'+
'\n}'+
'\n.button { background-color: #E3E4EA; color: #5D636E; border: 1px solid #929BAB; margin: 1px;  }'+
'\n.button:hover { background-color: #F4F4F6; color: #5D636E; border: 1px solid #929BAB; margin: 1px;  }'+
'\ndiv.field{'+
'\nmargin:0;padding:2px;'+
'\n}\n'

addNewStyleSheetByFullCSS(fullCSS);
