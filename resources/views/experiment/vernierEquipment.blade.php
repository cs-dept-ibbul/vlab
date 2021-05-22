<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:epub="http://www.idpf.org/2007/ops">
  <head>
    <meta charset="utf-8" />
    <title>Vernier Calipers Model</title>
 <link href="{{ asset('css/style.css')}}" rel="stylesheet" media="all">

<style type="text/css">
.metadata { display: none; }
</style>
<script async="true" src="https://www.googletagmanager.com/gtag/js?id=UA-3326007-19"></script>
<?php
    $sizes = explode('-', $_GET['size']);
    $size = $sizes[0];
    $sizeI = $sizes[1];
    $sizeD = $sizes[2];
       if(Session::has('experimentMode')){
          if (session('experimentMode') == 1) {
              $mode  = true;            
          }else{
              $mode = false;
          }
        }else{
          $mode = false;
        }
?>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-3326007-19');
</script>
<script data-ad-client="ca-pub-0121577198857509" async="true" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>    <link rel="stylesheet" type="text/css" href="{{ asset('experiments/_ejs_library/css/ejss.css')}}"></link>
    <link rel="stylesheet"  type="text/css" href="{{ asset('experiments/VernierCaliper/ejsDescription.css')}}" />
    <script src="{{ asset('experiments/_ejs_library/scripts/common_script.js')}}"></script>
    <script src="{{ asset('experiments/_ejs_library/scripts/textresizedetector.js')}}"></script>
    <script src="{{ asset('experiments/_ejs_library/ejsS.v1.min.js')}}"></script>
    <script src="{{ asset('js/jquery-3.1.1.min.js')}}"></script>
<script type="text/javascript"><!--//--><![CDATA[//><!--
var testMode = <?php echo json_encode($mode); ?>;

function AAPTVernierCaliper(_topFrame,_libraryPath,_codebasePath, _inputParameters) {
  var _model = EJSS_CORE.createAnimationLMS();
  var _view;
  var _isPlaying = false;
  var _isPaused = true;
  var _isMobile = (navigator===undefined) ? false : navigator.userAgent.match(/iPhone|iPad|iPod|Android|BlackBerry|Opera Mini|IEMobile/i);

var _stringProperties = {};
  var _tools = EJSS_CORE.Tools;
  function _play()  { _isPaused = false; _isPlaying = true;  _model.play();  }
  function _pause() { _isPaused = true;  _isPlaying = false; _model.pause(); }
  function _step()  { _pause();  _model.step(); }
  function _reset() { _model.reset();  _isPaused = _model.isPaused(); _isPlaying = _model.isPlaying(); }
  _model._play  = _play;
  _model._pause = _pause;
  _model._step  = _step;
  _model._reset = _reset;
  function _update() { _model.update(); }
  function _initialize() { _model.initialize(); }
  function _setFPS(_fps) { _model.setFPS(_fps); }
  function _setDelay(_delay) { _model.setDelay(_delay); }
  function _setStepsPerDisplay(_spd) { _model.setStepsPerDisplay(_spd); }
  function _setUpdateView(_updateView) { _model.setUpdateView(_updateView); }
  function _setAutoplay(_auto) { _model.setAutoplay(_auto); }
  function _println(_message) { console.log(_message); }

  function _breakAfterThisPage() { _model.setShouldBreak(true); }

  function _resetSolvers() { if (_model.resetSolvers) _model.resetSolvers(); }

  function _saveText(name,type,content) { if (_model.saveText) _model.saveText(name,type,content); }

  function _saveState(name) { if (_model.saveState) _model.saveState(name); }

  function _saveImage(name,panelname) { if (_model.saveImage) _model.saveImage(name,panelname); }

  function _readState(url,type) { if (_model.readState) _model.readState(url,type); }

  function _readText(url,type,varname) { if (_model.readText) _model.readText(url,type,varname); }

  function _getStringProperty(propertyName) {
    var _value = _stringProperties[propertyName];
    if (_value===undefined) return propertyName;
    else return _value;
  }
  var __pagesEnabled = [];
  function _setPageEnabled(pageName,enabled) { __pagesEnabled[pageName] = enabled; }

  var display; // EjsS Model.Variables.coordinate.display
  var inputdropmenu; // EjsS Model.Variables.coordinate.inputdropmenu
  var font; // EjsS Model.Variables.coordinate.font
  var range; // EjsS Model.Variables.coordinate.range
  var xmin; // EjsS Model.Variables.coordinate.xmin
  var xmax; // EjsS Model.Variables.coordinate.xmax
  var ymin; // EjsS Model.Variables.coordinate.ymin
  var ymax; // EjsS Model.Variables.coordinate.ymax
  var t; // EjsS Model.Variables.coordinate.t
  var dt; // EjsS Model.Variables.coordinate.dt
  var size; // EjsS Model.Variables.coordinate.size
  var size2; // EjsS Model.Variables.coordinate.size2
  var stroke; // EjsS Model.Variables.coordinate.stroke
  var autoscale; // EjsS Model.Variables.coordinate.autoscale
  var zoom; // EjsS Model.Variables.coordinate.zoom

  var x1; // EjsS Model.Variables.MainScale.x1
  var x2; // EjsS Model.Variables.MainScale.x2
  var y1; // EjsS Model.Variables.MainScale.y1
  var y2; // EjsS Model.Variables.MainScale.y2
  var y3; // EjsS Model.Variables.MainScale.y3
  var points; // EjsS Model.Variables.MainScale.points
  var x7; // EjsS Model.Variables.MainScale.x7
  var y7; // EjsS Model.Variables.MainScale.y7
  var xy7; // EjsS Model.Variables.MainScale.xy7
  var xy71; // EjsS Model.Variables.MainScale.xy71

  var nm; // EjsS Model.Variables.RulerMainScaleMarking.nm
  var nmt; // EjsS Model.Variables.RulerMainScaleMarking.nmt
  var xm; // EjsS Model.Variables.RulerMainScaleMarking.xm
  var ym; // EjsS Model.Variables.RulerMainScaleMarking.ym
  var dym; // EjsS Model.Variables.RulerMainScaleMarking.dym
  var xmt; // EjsS Model.Variables.RulerMainScaleMarking.xmt
  var tmt; // EjsS Model.Variables.RulerMainScaleMarking.tmt
  var zerox; // EjsS Model.Variables.RulerMainScaleMarking.zerox
  var dxm; // EjsS Model.Variables.RulerMainScaleMarking.dxm
  var zero; // EjsS Model.Variables.RulerMainScaleMarking.zero
  var zeroxm; // EjsS Model.Variables.RulerMainScaleMarking.zeroxm
  var n2; // EjsS Model.Variables.RulerMainScaleMarking.n2
  var n2t; // EjsS Model.Variables.RulerMainScaleMarking.n2t
  var n2s; // EjsS Model.Variables.RulerMainScaleMarking.n2s
  var nmode; // EjsS Model.Variables.RulerMainScaleMarking.nmode
  var xm2; // EjsS Model.Variables.RulerMainScaleMarking.xm2
  var ym2; // EjsS Model.Variables.RulerMainScaleMarking.ym2
  var dy2; // EjsS Model.Variables.RulerMainScaleMarking.dy2
  var xm2t; // EjsS Model.Variables.RulerMainScaleMarking.xm2t
  var tm2t; // EjsS Model.Variables.RulerMainScaleMarking.tm2t
  var dx2; // EjsS Model.Variables.RulerMainScaleMarking.dx2
  var dycst; // EjsS Model.Variables.RulerMainScaleMarking.dycst
  var dychk; // EjsS Model.Variables.RulerMainScaleMarking.dychk

  var x; // EjsS Model.Variables.basic.x
  var xreplacedrag; // EjsS Model.Variables.basic.xreplacedrag
  var y; // EjsS Model.Variables.basic.y
  var vx; // EjsS Model.Variables.basic.vx
  var vy; // EjsS Model.Variables.basic.vy
  var mx; // EjsS Model.Variables.basic.mx
  var my; // EjsS Model.Variables.basic.my
  var mxs; // EjsS Model.Variables.basic.mxs
  var xs; // EjsS Model.Variables.basic.xs
  var mode; // EjsS Model.Variables.basic.mode
  var unit; // EjsS Model.Variables.basic.unit
  var xp; // EjsS Model.Variables.basic.xp
  var xpt; // EjsS Model.Variables.basic.xpt
  var out; // EjsS Model.Variables.basic.out
  var vs; // EjsS Model.Variables.basic.vs
  var vsid; // EjsS Model.Variables.basic.vsid
  var vsidarray; // EjsS Model.Variables.basic.vsidarray
  var vss; // EjsS Model.Variables.basic.vss
  var vssidarray; // EjsS Model.Variables.basic.vssidarray
  var error; // EjsS Model.Variables.basic.error

  var L; // EjsS Model.Variables.VernierScale.L
  var x6; // EjsS Model.Variables.VernierScale.x6
  var y6; // EjsS Model.Variables.VernierScale.y6
  var xy6; // EjsS Model.Variables.VernierScale.xy6
  var topnutx; // EjsS Model.Variables.VernierScale.topnutx
  var topnuty; // EjsS Model.Variables.VernierScale.topnuty
  var xdrag; // EjsS Model.Variables.VernierScale.xdrag

  var cmshow; // EjsS Model.Variables.language.cmshow
  var l_play; // EjsS Model.Variables.language.l_play
  var l_pause; // EjsS Model.Variables.language.l_pause
  var l_reset; // EjsS Model.Variables.language.l_reset
  var l_init; // EjsS Model.Variables.language.l_init
  var label; // EjsS Model.Variables.language.label
  var l_step; // EjsS Model.Variables.language.l_step
  var l_unit; // EjsS Model.Variables.language.l_unit
  var l_unit2; // EjsS Model.Variables.language.l_unit2
  var show; // EjsS Model.Variables.language.show
  var l_x; // EjsS Model.Variables.language.l_x
  var showhint; // EjsS Model.Variables.language.showhint

  var text2; // EjsS Model.Variables.numbers.text2
  var text2cm; // EjsS Model.Variables.numbers.text2cm
  var text1; // EjsS Model.Variables.numbers.text1
  var condition; // EjsS Model.Variables.numbers.condition

  var topjawpoints; // EjsS Model.Variables.topjaw.topjawpoints
  var x5; // EjsS Model.Variables.topjaw.x5
  var y5; // EjsS Model.Variables.topjaw.y5
  var xy5; // EjsS Model.Variables.topjaw.xy5

  var shapetype; // EjsS Model.Variables.object.shapetype
  var roundshapetype; // EjsS Model.Variables.object.roundshapetype
  var w; // EjsS Model.Variables.object.w
  var oxmin; // EjsS Model.Variables.object.oxmin
  var oxmax; // EjsS Model.Variables.object.oxmax
  var h; // EjsS Model.Variables.object.h
  var y0; // EjsS Model.Variables.object.y0
  var ox; // EjsS Model.Variables.object.ox
  var oy; // EjsS Model.Variables.object.oy
  var topone; // EjsS Model.Variables.object.topone
  var botone; // EjsS Model.Variables.object.botone
  var ratio; // EjsS Model.Variables.object.ratio
  var value; // EjsS Model.Variables.object.value
  var d; // EjsS Model.Variables.object.d
  var oymax; // EjsS Model.Variables.object.oymax
  var oymin; // EjsS Model.Variables.object.oymin
  var xdmin; // EjsS Model.Variables.object.xdmin
  var b; // EjsS Model.Variables.object.b
  var a; // EjsS Model.Variables.object.a
  var n8; // EjsS Model.Variables.object.n8
  var x0; // EjsS Model.Variables.object.x0
  var ya; // EjsS Model.Variables.object.ya
  var yb; // EjsS Model.Variables.object.yb
  var px; // EjsS Model.Variables.object.px
  var py; // EjsS Model.Variables.object.py
  var pxy; // EjsS Model.Variables.object.pxy
  var insideinnerjaws; // EjsS Model.Variables.object.insideinnerjaws
  var outobject; // EjsS Model.Variables.object.outobject
  var bottomdragmesizemax; // EjsS Model.Variables.object.bottomdragmesizemax
  var bottomdragmesize; // EjsS Model.Variables.object.bottomdragmesize
  var bottomresizex; // EjsS Model.Variables.object.bottomresizex
  var topresizex; // EjsS Model.Variables.object.topresizex
  var tailresizex; // EjsS Model.Variables.object.tailresizex

  var increment; // EjsS Model.Variables.Tail.increment
  var xt; // EjsS Model.Variables.Tail.xt
  var yt; // EjsS Model.Variables.Tail.yt
  var xytail; // EjsS Model.Variables.Tail.xytail
  var x4; // EjsS Model.Variables.Tail.x4
  var y4; // EjsS Model.Variables.Tail.y4
  var td; // EjsS Model.Variables.Tail.td
  var td2; // EjsS Model.Variables.Tail.td2
  var h2; // EjsS Model.Variables.Tail.h2
  var oxtail; // EjsS Model.Variables.Tail.oxtail
  var oytail; // EjsS Model.Variables.Tail.oytail
  var oxytail; // EjsS Model.Variables.Tail.oxytail
  var xtail; // EjsS Model.Variables.Tail.xtail
  var tdmin; // EjsS Model.Variables.Tail.tdmin
  var tail; // EjsS Model.Variables.Tail.tail

  var showAnswerFlag; // EjsS Model.Variables.check.showAnswerFlag
  var counter; // EjsS Model.Variables.check.counter
  var answer; // EjsS Model.Variables.check.answer
  var l_answer; // EjsS Model.Variables.check.l_answer
  var l_enterK1f; // EjsS Model.Variables.check.l_enterK1f
  var entry; // EjsS Model.Variables.check.entry
  var enterK1f; // EjsS Model.Variables.check.enterK1f
  var K1fcorrect; // EjsS Model.Variables.check.K1fcorrect
  var K1fcorrectbackground; // EjsS Model.Variables.check.K1fcorrectbackground
  var background; // EjsS Model.Variables.check.background

  var showmagnify; // EjsS Model.Variables.magnify.showmagnify
  var xmagnify; // EjsS Model.Variables.magnify.xmagnify
  var ymagnify; // EjsS Model.Variables.magnify.ymagnify
  var factor; // EjsS Model.Variables.magnify.factor
  var factordrag; // EjsS Model.Variables.magnify.factordrag
  var wmagnify; // EjsS Model.Variables.magnify.wmagnify
  var ratiomagnify; // EjsS Model.Variables.magnify.ratiomagnify

  var selected; // EjsS Model.Variables.layout.selected
  var text; // EjsS Model.Variables.layout.text
  var Width; // EjsS Model.Variables.layout.Width
  var Height; // EjsS Model.Variables.layout.Height
  var Width1; // EjsS Model.Variables.layout.Width1
  var Width2; // EjsS Model.Variables.layout.Width2
  var world; // EjsS Model.Variables.layout.world
  var graph; // EjsS Model.Variables.layout.graph
  var disabledworld; // EjsS Model.Variables.layout.disabledworld
  var disabled; // EjsS Model.Variables.layout.disabled
  var isAndroid; // EjsS Model.Variables.layout.isAndroid
  var Android; // EjsS Model.Variables.layout.Android
  var iOS; // EjsS Model.Variables.layout.iOS
  var iPad; // EjsS Model.Variables.layout.iPad
  var iPhone; // EjsS Model.Variables.layout.iPhone
  var iOSapp; // EjsS Model.Variables.layout.iOSapp
  var Androidapp; // EjsS Model.Variables.layout.Androidapp

  var resultofstringvalue; // EjsS Model.Variables.clevercodemenu.resultofstringvalue
  var resultofstringvalue2; // EjsS Model.Variables.clevercodemenu.resultofstringvalue2
  var resultofstringvalue3; // EjsS Model.Variables.clevercodemenu.resultofstringvalue3
  var resultofstringvaluegame; // EjsS Model.Variables.clevercodemenu.resultofstringvaluegame
  var resultofstringvaluegame2; // EjsS Model.Variables.clevercodemenu.resultofstringvaluegame2
  var resultofstringvaluegame3; // EjsS Model.Variables.clevercodemenu.resultofstringvaluegame3
  var test; // EjsS Model.Variables.clevercodemenu.test

  var dragmex; // EjsS Model.Variables.dragme.dragmex
  var dragmexs; // EjsS Model.Variables.dragme.dragmexs
  var dragmey; // EjsS Model.Variables.dragme.dragmey
  var dragemetrue; // EjsS Model.Variables.dragme.dragemetrue
  var dragemetrue2; // EjsS Model.Variables.dragme.dragemetrue2

  var _privateOdesList;
  var _ODEi_evolution1;
  var userEvents1=[];

  _model.getOdes = function() { return [_ODEi_evolution1]; };

  _model.removeEvents = function(){
    userEvents1=[];
  };

  function _serialize() { return _model.serialize(); }

  _model._userSerialize = function() {
    return {
      display : display,
      inputdropmenu : inputdropmenu,
      font : font,
      range : range,
      xmin : xmin,
      xmax : xmax,
      ymin : ymin,
      ymax : ymax,
      t : t,
      dt : dt,
      size : size,
      size2 : size2,
      stroke : stroke,
      autoscale : autoscale,
      zoom : zoom,
      x1 : x1,
      x2 : x2,
      y1 : y1,
      y2 : y2,
      y3 : y3,
      points : points,
      x7 : x7,
      y7 : y7,
      xy7 : xy7,
      xy71 : xy71,
      nm : nm,
      nmt : nmt,
      xm : xm,
      ym : ym,
      dym : dym,
      xmt : xmt,
      tmt : tmt,
      zerox : zerox,
      dxm : dxm,
      zero : zero,
      zeroxm : zeroxm,
      n2 : n2,
      n2t : n2t,
      n2s : n2s,
      nmode : nmode,
      xm2 : xm2,
      ym2 : ym2,
      dy2 : dy2,
      xm2t : xm2t,
      tm2t : tm2t,
      dx2 : dx2,
      dycst : dycst,
      dychk : dychk,
      x : x,
      xreplacedrag : xreplacedrag,
      y : y,
      vx : vx,
      vy : vy,
      mx : mx,
      my : my,
      mxs : mxs,
      xs : xs,
      mode : mode,
      unit : unit,
      xp : xp,
      xpt : xpt,
      out : out,
      vs : vs,
      vsid : vsid,
      vsidarray : vsidarray,
      vss : vss,
      vssidarray : vssidarray,
      error : error,
      L : L,
      x6 : x6,
      y6 : y6,
      xy6 : xy6,
      topnutx : topnutx,
      topnuty : topnuty,
      xdrag : xdrag,
      cmshow : cmshow,
      l_play : l_play,
      l_pause : l_pause,
      l_reset : l_reset,
      l_init : l_init,
      label : label,
      l_step : l_step,
      l_unit : l_unit,
      l_unit2 : l_unit2,
      show : show,
      l_x : l_x,
      showhint : showhint,
      text2 : text2,
      text2cm : text2cm,
      text1 : text1,
      condition : condition,
      topjawpoints : topjawpoints,
      x5 : x5,
      y5 : y5,
      xy5 : xy5,
      shapetype : shapetype,
      roundshapetype : roundshapetype,
      w : w,
      oxmin : oxmin,
      oxmax : oxmax,
      h : h,
      y0 : y0,
      ox : ox,
      oy : oy,
      topone : topone,
      botone : botone,
      ratio : ratio,
      value : value,
      d : d,
      oymax : oymax,
      oymin : oymin,
      xdmin : xdmin,
      b : b,
      a : a,
      n8 : n8,
      x0 : x0,
      ya : ya,
      yb : yb,
      px : px,
      py : py,
      pxy : pxy,
      insideinnerjaws : insideinnerjaws,
      outobject : outobject,
      bottomdragmesizemax : bottomdragmesizemax,
      bottomdragmesize : bottomdragmesize,
      bottomresizex : bottomresizex,
      topresizex : topresizex,
      tailresizex : tailresizex,
      increment : increment,
      xt : xt,
      yt : yt,
      xytail : xytail,
      x4 : x4,
      y4 : y4,
      td : td,
      td2 : td2,
      h2 : h2,
      oxtail : oxtail,
      oytail : oytail,
      oxytail : oxytail,
      xtail : xtail,
      tdmin : tdmin,
      tail : tail,
      showAnswerFlag : showAnswerFlag,
      counter : counter,
      answer : answer,
      l_answer : l_answer,
      l_enterK1f : l_enterK1f,
      entry : entry,
      enterK1f : enterK1f,
      K1fcorrect : K1fcorrect,
      K1fcorrectbackground : K1fcorrectbackground,
      background : background,
      showmagnify : showmagnify,
      xmagnify : xmagnify,
      ymagnify : ymagnify,
      factor : factor,
      factordrag : factordrag,
      wmagnify : wmagnify,
      ratiomagnify : ratiomagnify,
      selected : selected,
      text : text,
      Width : Width,
      Height : Height,
      Width1 : Width1,
      Width2 : Width2,
      world : world,
      graph : graph,
      disabledworld : disabledworld,
      disabled : disabled,
      isAndroid : isAndroid,
      Android : Android,
      iOS : iOS,
      iPad : iPad,
      iPhone : iPhone,
      iOSapp : iOSapp,
      Androidapp : Androidapp,
      resultofstringvalue : resultofstringvalue,
      resultofstringvalue2 : resultofstringvalue2,
      resultofstringvalue3 : resultofstringvalue3,
      resultofstringvaluegame : resultofstringvaluegame,
      resultofstringvaluegame2 : resultofstringvaluegame2,
      resultofstringvaluegame3 : resultofstringvaluegame3,
      test : test,
      dragmex : dragmex,
      dragmexs : dragmexs,
      dragmey : dragmey,
      dragemetrue : dragemetrue,
      dragemetrue2 : dragemetrue2
    };
  };

  _model._readParameters = function(json) {
    if(typeof json.display != "undefined") display = json.display;
    if(typeof json.inputdropmenu != "undefined") inputdropmenu = json.inputdropmenu;
    if(typeof json.font != "undefined") font = json.font;
    if(typeof json.range != "undefined") range = json.range;
    if(typeof json.xmin != "undefined") xmin = json.xmin;
    if(typeof json.xmax != "undefined") xmax = json.xmax;
    if(typeof json.ymin != "undefined") ymin = json.ymin;
    if(typeof json.ymax != "undefined") ymax = json.ymax;
    if(typeof json.t != "undefined") t = json.t;
    if(typeof json.dt != "undefined") dt = json.dt;
    if(typeof json.size != "undefined") size = json.size;
    if(typeof json.size2 != "undefined") size2 = json.size2;
    if(typeof json.stroke != "undefined") stroke = json.stroke;
    if(typeof json.autoscale != "undefined") autoscale = json.autoscale;
    if(typeof json.zoom != "undefined") zoom = json.zoom;
    if(typeof json.x1 != "undefined") x1 = json.x1;
    if(typeof json.x2 != "undefined") x2 = json.x2;
    if(typeof json.y1 != "undefined") y1 = json.y1;
    if(typeof json.y2 != "undefined") y2 = json.y2;
    if(typeof json.y3 != "undefined") y3 = json.y3;
    if(typeof json.points != "undefined") points = json.points;
    if(typeof json.x7 != "undefined") x7 = json.x7;
    if(typeof json.y7 != "undefined") y7 = json.y7;
    if(typeof json.xy7 != "undefined") xy7 = json.xy7;
    if(typeof json.xy71 != "undefined") xy71 = json.xy71;
    if(typeof json.nm != "undefined") nm = json.nm;
    if(typeof json.nmt != "undefined") nmt = json.nmt;
    if(typeof json.xm != "undefined") xm = json.xm;
    if(typeof json.ym != "undefined") ym = json.ym;
    if(typeof json.dym != "undefined") dym = json.dym;
    if(typeof json.xmt != "undefined") xmt = json.xmt;
    if(typeof json.tmt != "undefined") tmt = json.tmt;
    if(typeof json.zerox != "undefined") zerox = json.zerox;
    if(typeof json.dxm != "undefined") dxm = json.dxm;
    if(typeof json.zero != "undefined") zero = json.zero;
    if(typeof json.zeroxm != "undefined") zeroxm = json.zeroxm;
    if(typeof json.n2 != "undefined") n2 = json.n2;
    if(typeof json.n2t != "undefined") n2t = json.n2t;
    if(typeof json.n2s != "undefined") n2s = json.n2s;
    if(typeof json.nmode != "undefined") nmode = json.nmode;
    if(typeof json.xm2 != "undefined") xm2 = json.xm2;
    if(typeof json.ym2 != "undefined") ym2 = json.ym2;
    if(typeof json.dy2 != "undefined") dy2 = json.dy2;
    if(typeof json.xm2t != "undefined") xm2t = json.xm2t;
    if(typeof json.tm2t != "undefined") tm2t = json.tm2t;
    if(typeof json.dx2 != "undefined") dx2 = json.dx2;
    if(typeof json.dycst != "undefined") dycst = json.dycst;
    if(typeof json.dychk != "undefined") dychk = json.dychk;
    if(typeof json.x != "undefined") x = json.x;
    if(typeof json.xreplacedrag != "undefined") xreplacedrag = json.xreplacedrag;
    if(typeof json.y != "undefined") y = json.y;
    if(typeof json.vx != "undefined") vx = json.vx;
    if(typeof json.vy != "undefined") vy = json.vy;
    if(typeof json.mx != "undefined") mx = json.mx;
    if(typeof json.my != "undefined") my = json.my;
    if(typeof json.mxs != "undefined") mxs = json.mxs;
    if(typeof json.xs != "undefined") xs = json.xs;
    if(typeof json.mode != "undefined") mode = json.mode;
    if(typeof json.unit != "undefined") unit = json.unit;
    if(typeof json.xp != "undefined") xp = json.xp;
    if(typeof json.xpt != "undefined") xpt = json.xpt;
    if(typeof json.out != "undefined") out = json.out;
    if(typeof json.vs != "undefined") vs = json.vs;
    if(typeof json.vsid != "undefined") vsid = json.vsid;
    if(typeof json.vsidarray != "undefined") vsidarray = json.vsidarray;
    if(typeof json.vss != "undefined") vss = json.vss;
    if(typeof json.vssidarray != "undefined") vssidarray = json.vssidarray;
    if(typeof json.error != "undefined") error = json.error;
    if(typeof json.L != "undefined") L = json.L;
    if(typeof json.x6 != "undefined") x6 = json.x6;
    if(typeof json.y6 != "undefined") y6 = json.y6;
    if(typeof json.xy6 != "undefined") xy6 = json.xy6;
    if(typeof json.topnutx != "undefined") topnutx = json.topnutx;
    if(typeof json.topnuty != "undefined") topnuty = json.topnuty;
    if(typeof json.xdrag != "undefined") xdrag = json.xdrag;
    if(typeof json.cmshow != "undefined") cmshow = json.cmshow;
    if(typeof json.l_play != "undefined") l_play = json.l_play;
    if(typeof json.l_pause != "undefined") l_pause = json.l_pause;
    if(typeof json.l_reset != "undefined") l_reset = json.l_reset;
    if(typeof json.l_init != "undefined") l_init = json.l_init;
    if(typeof json.label != "undefined") label = json.label;
    if(typeof json.l_step != "undefined") l_step = json.l_step;
    if(typeof json.l_unit != "undefined") l_unit = json.l_unit;
    if(typeof json.l_unit2 != "undefined") l_unit2 = json.l_unit2;
    if(typeof json.show != "undefined") show = json.show;
    if(typeof json.l_x != "undefined") l_x = json.l_x;
    if(typeof json.showhint != "undefined") showhint = json.showhint;
    if(typeof json.text2 != "undefined") text2 = json.text2;
    if(typeof json.text2cm != "undefined") text2cm = json.text2cm;
    if(typeof json.text1 != "undefined") text1 = json.text1;
    if(typeof json.condition != "undefined") condition = json.condition;
    if(typeof json.topjawpoints != "undefined") topjawpoints = json.topjawpoints;
    if(typeof json.x5 != "undefined") x5 = json.x5;
    if(typeof json.y5 != "undefined") y5 = json.y5;
    if(typeof json.xy5 != "undefined") xy5 = json.xy5;
    if(typeof json.shapetype != "undefined") shapetype = json.shapetype;
    if(typeof json.roundshapetype != "undefined") roundshapetype = json.roundshapetype;
    if(typeof json.w != "undefined") w = json.w;
    if(typeof json.oxmin != "undefined") oxmin = json.oxmin;
    if(typeof json.oxmax != "undefined") oxmax = json.oxmax;
    if(typeof json.h != "undefined") h = json.h;
    if(typeof json.y0 != "undefined") y0 = json.y0;
    if(typeof json.ox != "undefined") ox = json.ox;
    if(typeof json.oy != "undefined") oy = json.oy;
    if(typeof json.topone != "undefined") topone = json.topone;
    if(typeof json.botone != "undefined") botone = json.botone;
    if(typeof json.ratio != "undefined") ratio = json.ratio;
    if(typeof json.value != "undefined") value = json.value;
    if(typeof json.d != "undefined") d = json.d;
    if(typeof json.oymax != "undefined") oymax = json.oymax;
    if(typeof json.oymin != "undefined") oymin = json.oymin;
    if(typeof json.xdmin != "undefined") xdmin = json.xdmin;
    if(typeof json.b != "undefined") b = json.b;
    if(typeof json.a != "undefined") a = json.a;
    if(typeof json.n8 != "undefined") n8 = json.n8;
    if(typeof json.x0 != "undefined") x0 = json.x0;
    if(typeof json.ya != "undefined") ya = json.ya;
    if(typeof json.yb != "undefined") yb = json.yb;
    if(typeof json.px != "undefined") px = json.px;
    if(typeof json.py != "undefined") py = json.py;
    if(typeof json.pxy != "undefined") pxy = json.pxy;
    if(typeof json.insideinnerjaws != "undefined") insideinnerjaws = json.insideinnerjaws;
    if(typeof json.outobject != "undefined") outobject = json.outobject;
    if(typeof json.bottomdragmesizemax != "undefined") bottomdragmesizemax = json.bottomdragmesizemax;
    if(typeof json.bottomdragmesize != "undefined") bottomdragmesize = json.bottomdragmesize;
    if(typeof json.bottomresizex != "undefined") bottomresizex = json.bottomresizex;
    if(typeof json.topresizex != "undefined") topresizex = json.topresizex;
    if(typeof json.tailresizex != "undefined") tailresizex = json.tailresizex;
    if(typeof json.increment != "undefined") increment = json.increment;
    if(typeof json.xt != "undefined") xt = json.xt;
    if(typeof json.yt != "undefined") yt = json.yt;
    if(typeof json.xytail != "undefined") xytail = json.xytail;
    if(typeof json.x4 != "undefined") x4 = json.x4;
    if(typeof json.y4 != "undefined") y4 = json.y4;
    if(typeof json.td != "undefined") td = json.td;
    if(typeof json.td2 != "undefined") td2 = json.td2;
    if(typeof json.h2 != "undefined") h2 = json.h2;
    if(typeof json.oxtail != "undefined") oxtail = json.oxtail;
    if(typeof json.oytail != "undefined") oytail = json.oytail;
    if(typeof json.oxytail != "undefined") oxytail = json.oxytail;
    if(typeof json.xtail != "undefined") xtail = json.xtail;
    if(typeof json.tdmin != "undefined") tdmin = json.tdmin;
    if(typeof json.tail != "undefined") tail = json.tail;
    if(typeof json.showAnswerFlag != "undefined") showAnswerFlag = json.showAnswerFlag;
    if(typeof json.counter != "undefined") counter = json.counter;
    if(typeof json.answer != "undefined") answer = json.answer;
    if(typeof json.l_answer != "undefined") l_answer = json.l_answer;
    if(typeof json.l_enterK1f != "undefined") l_enterK1f = json.l_enterK1f;
    if(typeof json.entry != "undefined") entry = json.entry;
    if(typeof json.enterK1f != "undefined") enterK1f = json.enterK1f;
    if(typeof json.K1fcorrect != "undefined") K1fcorrect = json.K1fcorrect;
    if(typeof json.K1fcorrectbackground != "undefined") K1fcorrectbackground = json.K1fcorrectbackground;
    if(typeof json.background != "undefined") background = json.background;
    if(typeof json.showmagnify != "undefined") showmagnify = json.showmagnify;
    if(typeof json.xmagnify != "undefined") xmagnify = json.xmagnify;
    if(typeof json.ymagnify != "undefined") ymagnify = json.ymagnify;
    if(typeof json.factor != "undefined") factor = json.factor;
    if(typeof json.factordrag != "undefined") factordrag = json.factordrag;
    if(typeof json.wmagnify != "undefined") wmagnify = json.wmagnify;
    if(typeof json.ratiomagnify != "undefined") ratiomagnify = json.ratiomagnify;
    if(typeof json.selected != "undefined") selected = json.selected;
    if(typeof json.text != "undefined") text = json.text;
    if(typeof json.Width != "undefined") Width = json.Width;
    if(typeof json.Height != "undefined") Height = json.Height;
    if(typeof json.Width1 != "undefined") Width1 = json.Width1;
    if(typeof json.Width2 != "undefined") Width2 = json.Width2;
    if(typeof json.world != "undefined") world = json.world;
    if(typeof json.graph != "undefined") graph = json.graph;
    if(typeof json.disabledworld != "undefined") disabledworld = json.disabledworld;
    if(typeof json.disabled != "undefined") disabled = json.disabled;
    if(typeof json.isAndroid != "undefined") isAndroid = json.isAndroid;
    if(typeof json.Android != "undefined") Android = json.Android;
    if(typeof json.iOS != "undefined") iOS = json.iOS;
    if(typeof json.iPad != "undefined") iPad = json.iPad;
    if(typeof json.iPhone != "undefined") iPhone = json.iPhone;
    if(typeof json.iOSapp != "undefined") iOSapp = json.iOSapp;
    if(typeof json.Androidapp != "undefined") Androidapp = json.Androidapp;
    if(typeof json.resultofstringvalue != "undefined") resultofstringvalue = json.resultofstringvalue;
    if(typeof json.resultofstringvalue2 != "undefined") resultofstringvalue2 = json.resultofstringvalue2;
    if(typeof json.resultofstringvalue3 != "undefined") resultofstringvalue3 = json.resultofstringvalue3;
    if(typeof json.resultofstringvaluegame != "undefined") resultofstringvaluegame = json.resultofstringvaluegame;
    if(typeof json.resultofstringvaluegame2 != "undefined") resultofstringvaluegame2 = json.resultofstringvaluegame2;
    if(typeof json.resultofstringvaluegame3 != "undefined") resultofstringvaluegame3 = json.resultofstringvaluegame3;
    if(typeof json.test != "undefined") test = json.test;
    if(typeof json.dragmex != "undefined") dragmex = json.dragmex;
    if(typeof json.dragmexs != "undefined") dragmexs = json.dragmexs;
    if(typeof json.dragmey != "undefined") dragmey = json.dragmey;
    if(typeof json.dragemetrue != "undefined") dragemetrue = json.dragemetrue;
    if(typeof json.dragemetrue2 != "undefined") dragemetrue2 = json.dragemetrue2;
  };

  function _unserialize(json) { return _model.unserialize(json); }

  _model.addToReset(function() {
    __pagesEnabled["drawlowernumbers"] = true;
    __pagesEnabled["App"] = true;
    __pagesEnabled["MEssage"] = true;
    __pagesEnabled["drawupperscale"] = true;
    __pagesEnabled["mode"] = true;
    __pagesEnabled["mode 2"] = true;
    __pagesEnabled["smallestunitshow"] = true;
    __pagesEnabled["undefined"] = true;
    __pagesEnabled["svg"] = true;
    __pagesEnabled["Evol Page"] = true;
    __pagesEnabled["Event"] = true;
    __pagesEnabled["Event 2"] = true;
    __pagesEnabled["object"] = true;
    __pagesEnabled["topscaleneedredrawing"] = true;
    __pagesEnabled["answer"] = true;
    __pagesEnabled["checkmm"] = true;
    __pagesEnabled["magnify"] = true;
  });

  _model.addToReset(function() {
    display = "none"; // EjsS Model.Variables.coordinate.display
    inputdropmenu = true; // EjsS Model.Variables.coordinate.inputdropmenu
    font = _isMobile?"normal normal 2vw ":"normal normal 3vw "; // EjsS Model.Variables.coordinate.font
    range = 200; // EjsS Model.Variables.coordinate.range
    xmin = -range; // EjsS Model.Variables.coordinate.xmin
    xmax = range; // EjsS Model.Variables.coordinate.xmax
    ymin = -range/2; // EjsS Model.Variables.coordinate.ymin
    ymax = range/2; // EjsS Model.Variables.coordinate.ymax
    t = 0; // EjsS Model.Variables.coordinate.t
    dt = 1; // EjsS Model.Variables.coordinate.dt
    size = range/20; // EjsS Model.Variables.coordinate.size
    size2 = size/2; // EjsS Model.Variables.coordinate.size2
    stroke = 1; // EjsS Model.Variables.coordinate.stroke
    zoom = 1; // EjsS Model.Variables.coordinate.zoom
  });

  _model.addToReset(function() {
    x1 = 0.9*xmin; // EjsS Model.Variables.MainScale.x1
    x2 = x1-0.1*xmin; // EjsS Model.Variables.MainScale.x2
    y1 = ymax*0.7; // EjsS Model.Variables.MainScale.y1
    y2 = 0.0; // EjsS Model.Variables.MainScale.y2
    y3 = -y1; // EjsS Model.Variables.MainScale.y3
    points = 11; // EjsS Model.Variables.MainScale.points
    x7 = [xmax,x2+size*1.5,x2+size/2,x2,x2,x2+size/2,x2+size/2,x2,x1,x1,x2-size,x2,x2,x2-size/2,x2-size/2,x2,xmax]; // EjsS Model.Variables.MainScale.x7
    y7 = [y1,y1,y1+5*size2,y1+6*size2,y1+size/2,y1+size/2,y1,y1,y1,y3/2,y3+size/2,y3,y2-size,y2-size,y2,y2,y2]; // EjsS Model.Variables.MainScale.y7
    xy7 = [[xmax,y1],[x2+size*1.5,y1],[x2+size/2,y1+5*size2],[x2,y1+6*size2],[x2,y1+size/2],[x2+size/2,y1+size/2],[x2+size/2,y1],[x2,y1],[x1,y1],[x1,y3/2],[x2-size,y3+size/2],[x2,y3],[x2,y2-size],[x2-size/2,y2-size],[x2-size/2,y2],[x2,y2],[xmax,y2]]; // EjsS Model.Variables.MainScale.xy7
    xy71 = [[-794.331,-317.28],[ -813.926,-309.744],[ -827.491,-297.686],[ -933,27.884],[ 890.796,27.884],[ 893.811,12.812],[ -782.273,9.797],[ -785.288,18.841],[ -801.868,18.841],[ -791.317,-320.295 ]]; // EjsS Model.Variables.MainScale.xy71
  });

  _model.addToReset(function() {
    nm = 70; // EjsS Model.Variables.RulerMainScaleMarking.nm
    nmt = nm/10; // EjsS Model.Variables.RulerMainScaleMarking.nmt
    xm = new Array(nm); // EjsS Model.Variables.RulerMainScaleMarking.xm
    (function () {
      var _i0;
      for (_i0=0; _i0<nm; _i0+=1) {  // EjsS Model.Variables.RulerMainScaleMarking.xm
        xm[_i0] = 0.0;  // EjsS Model.Variables.RulerMainScaleMarking.xm
      }
    }());
    ym = new Array(nm); // EjsS Model.Variables.RulerMainScaleMarking.ym
    (function () {
      var _i0;
      for (_i0=0; _i0<nm; _i0+=1) {  // EjsS Model.Variables.RulerMainScaleMarking.ym
        ym[_i0] = 0.0;  // EjsS Model.Variables.RulerMainScaleMarking.ym
      }
    }());
    dym = new Array(nm); // EjsS Model.Variables.RulerMainScaleMarking.dym
    (function () {
      var _i0;
      for (_i0=0; _i0<nm; _i0+=1) {  // EjsS Model.Variables.RulerMainScaleMarking.dym
        dym[_i0] = 0.0;  // EjsS Model.Variables.RulerMainScaleMarking.dym
      }
    }());
    xmt = new Array(nmt); // EjsS Model.Variables.RulerMainScaleMarking.xmt
    (function () {
      var _i0;
      for (_i0=0; _i0<nmt; _i0+=1) {  // EjsS Model.Variables.RulerMainScaleMarking.xmt
        xmt[_i0] = 0.0;  // EjsS Model.Variables.RulerMainScaleMarking.xmt
      }
    }());
    tmt = new Array(nmt); // EjsS Model.Variables.RulerMainScaleMarking.tmt
    zerox = size/2; // EjsS Model.Variables.RulerMainScaleMarking.zerox
    dxm = (xmax-x2)/nm; // EjsS Model.Variables.RulerMainScaleMarking.dxm
    zero = 0; // EjsS Model.Variables.RulerMainScaleMarking.zero
    zeroxm = zerox; // EjsS Model.Variables.RulerMainScaleMarking.zeroxm
    n2 = 51; // EjsS Model.Variables.RulerMainScaleMarking.n2
    n2t = 11; // EjsS Model.Variables.RulerMainScaleMarking.n2t
    n2s = n2; // EjsS Model.Variables.RulerMainScaleMarking.n2s
    nmode = 10; // EjsS Model.Variables.RulerMainScaleMarking.nmode
    xm2 = new Array(n2); // EjsS Model.Variables.RulerMainScaleMarking.xm2
    (function () {
      var _i0;
      for (_i0=0; _i0<n2; _i0+=1) {  // EjsS Model.Variables.RulerMainScaleMarking.xm2
        xm2[_i0] = 0.0;  // EjsS Model.Variables.RulerMainScaleMarking.xm2
      }
    }());
    ym2 = new Array(n2); // EjsS Model.Variables.RulerMainScaleMarking.ym2
    (function () {
      var _i0;
      for (_i0=0; _i0<n2; _i0+=1) {  // EjsS Model.Variables.RulerMainScaleMarking.ym2
        ym2[_i0] = 0.0;  // EjsS Model.Variables.RulerMainScaleMarking.ym2
      }
    }());
    dy2 = new Array(n2); // EjsS Model.Variables.RulerMainScaleMarking.dy2
    (function () {
      var _i0;
      for (_i0=0; _i0<n2; _i0+=1) {  // EjsS Model.Variables.RulerMainScaleMarking.dy2
        dy2[_i0] = 0.0;  // EjsS Model.Variables.RulerMainScaleMarking.dy2
      }
    }());
    xm2t = new Array(n2t); // EjsS Model.Variables.RulerMainScaleMarking.xm2t
    (function () {
      var _i0;
      for (_i0=0; _i0<n2t; _i0+=1) {  // EjsS Model.Variables.RulerMainScaleMarking.xm2t
        xm2t[_i0] = 0.0;  // EjsS Model.Variables.RulerMainScaleMarking.xm2t
      }
    }());
    tm2t = new Array(n2t); // EjsS Model.Variables.RulerMainScaleMarking.tm2t
    (function () {
      var _i0;
      for (_i0=0; _i0<n2t; _i0+=1) {  // EjsS Model.Variables.RulerMainScaleMarking.tm2t
        tm2t[_i0] = "";  // EjsS Model.Variables.RulerMainScaleMarking.tm2t
      }
    }());
    dx2 = 49*dxm/50; // EjsS Model.Variables.RulerMainScaleMarking.dx2
    dycst = 1.0; // EjsS Model.Variables.RulerMainScaleMarking.dycst
    dychk = true; // EjsS Model.Variables.RulerMainScaleMarking.dychk
  });

  _model.addToReset(function() {
    x = 0; // EjsS Model.Variables.basic.x
    xreplacedrag = -50; // EjsS Model.Variables.basic.xreplacedrag
    y = 0; // EjsS Model.Variables.basic.y
    vx = 1; // EjsS Model.Variables.basic.vx
    vy = 0; // EjsS Model.Variables.basic.vy
    mx = -10; // EjsS Model.Variables.basic.mx
    my = 0; // EjsS Model.Variables.basic.my
    mxs = 0.0; // EjsS Model.Variables.basic.mxs
    xs = 0.0; // EjsS Model.Variables.basic.xs
    mode = new Array(1); // EjsS Model.Variables.basic.mode
    (function () {
      var _i0;
      for (_i0=0; _i0<1; _i0+=1) {  // EjsS Model.Variables.basic.mode
        mode[_i0] = "cm show";  // EjsS Model.Variables.basic.mode
      }
    }());
    unit = 0.0; // EjsS Model.Variables.basic.unit
    xp = 0.0; // EjsS Model.Variables.basic.xp
    xpt = 0.0; // EjsS Model.Variables.basic.xpt
    out = 0.0; // EjsS Model.Variables.basic.out
    vs = 0; // EjsS Model.Variables.basic.vs
    vsid = 0; // EjsS Model.Variables.basic.vsid
    vsidarray = 0; // EjsS Model.Variables.basic.vsidarray
    vss = 0; // EjsS Model.Variables.basic.vss
    vssidarray = 0; // EjsS Model.Variables.basic.vssidarray
    error = 0; // EjsS Model.Variables.basic.error
  });

  _model.addToReset(function() {
    L = 50*dxm+size; // EjsS Model.Variables.VernierScale.L
    x6 = [x2,x2,x2+size,x2+3*size,x2+L,x2+L]; // EjsS Model.Variables.VernierScale.x6
    y6 = [y2,y3,y3+size2,y3/1.7,y3/1.7,y2]; // EjsS Model.Variables.VernierScale.y6
    xy6 = [[x2,y2],[x2,y3],[x2+size,y3+size2],[x2+3*size,y3/1.7],[x2+L,y3/1.7],[x2+L,y2]]; // EjsS Model.Variables.VernierScale.xy6
    xdrag = -160+x; // EjsS Model.Variables.VernierScale.xdrag
  });

  _model.addToReset(function() {
    cmshow = false; // EjsS Model.Variables.language.cmshow
    l_play = "play"; // EjsS Model.Variables.language.l_play
    l_pause = "pause"; // EjsS Model.Variables.language.l_pause
    l_reset = "reset"; // EjsS Model.Variables.language.l_reset
    l_init = "initialize"; // EjsS Model.Variables.language.l_init
    label = "play"; // EjsS Model.Variables.language.label
    l_step = "step"; // EjsS Model.Variables.language.l_step
    l_unit = ""; // EjsS Model.Variables.language.l_unit
    l_unit2 = ""; // EjsS Model.Variables.language.l_unit2
    l_x = "d= ??? mm"; // EjsS Model.Variables.language.l_x
  });

  _model.addToReset(function() {
    condition = 0; // EjsS Model.Variables.numbers.condition
  });

  _model.addToReset(function() {
    topjawpoints = 7; // EjsS Model.Variables.topjaw.topjawpoints
    x5 = [x2-size/2,x2-size/2,x2,x2,x2-size/2,x2-size*1.5,x2]; // EjsS Model.Variables.topjaw.x5
    y5 = [y1,y1+size/2,y1+size/2,y1+6*size2,y1+5*size2,y1,y1]; // EjsS Model.Variables.topjaw.y5
    xy5 = [[x2-size/2,y1],[x2-size/2,y1+size/2],[x2,y1+size/2],[x2,y1+6*size2],[x2-size/2,y1+5*size2],[x2-size*1.5,y1],[x2,y1]]; // EjsS Model.Variables.topjaw.xy5
  });

  _model.addToReset(function() {
    shapetype = "RECTANGLE"; // EjsS Model.Variables.object.shapetype
    roundshapetype = false; // EjsS Model.Variables.object.roundshapetype
    w = <?php echo $size;  ?>// EjsS Model.Variables.object.w
    oxmin = x2; // EjsS Model.Variables.object.oxmin
    oxmax = oxmin+x; // EjsS Model.Variables.object.oxmax
    h = size*2; // EjsS Model.Variables.object.h
    y0 = y3-h*1.5; // EjsS Model.Variables.object.y0
    ox = oxmin+w/2; // EjsS Model.Variables.object.ox
    ratio = (x2-x1)/60; // EjsS Model.Variables.object.ratio
    value = (x-x1)/ratio-0.05; // EjsS Model.Variables.object.value
    d = x1-oxmin+0.65; // EjsS Model.Variables.object.d
    oymax = y2; // EjsS Model.Variables.object.oymax
    oymin = y3; // EjsS Model.Variables.object.oymin
    xdmin = ox+d+w/2; // EjsS Model.Variables.object.xdmin
    b =<?php echo $sizeI;  ?>;// EjsS Model.Variables.object.b
    a = size; // EjsS Model.Variables.object.a
    n8 = 8; // EjsS Model.Variables.object.n8
    x0 = x2-a; // EjsS Model.Variables.object.x0
    ya = ymax+size*2; // EjsS Model.Variables.object.ya
    yb = ya-4*size; // EjsS Model.Variables.object.yb
    px = [x0,x0+2*a+b,x0+2*a+b,x0+a+b,x0+a+b,x0+a,x0+a,x0]; // EjsS Model.Variables.object.px
    py = [ya,ya,yb,yb,ya-a,ya-a,yb,yb]; // EjsS Model.Variables.object.py
    pxy = [[x0,ya],[x0+2*a+b,ya],[x0+2*a+b,yb],[x0+a+b,yb],[x0+a+b,ya-a],[x0+a,ya-a],[x0+a,yb],[x0,yb]]; // EjsS Model.Variables.object.pxy
    bottomdragmesizemax = 0; // EjsS Model.Variables.object.bottomdragmesizemax
    if (testMode){
      bottomdragmesizemax = 0; // EjsS Model.Variables.object.bottomdragmesizemax
    }
    bottomdragmesize = bottomdragmesizemax; // EjsS Model.Variables.object.bottomdragmesize
    bottomresizex = ox+w/2; // EjsS Model.Variables.object.bottomresizex
    topresizex = b+(x0+2*a); // EjsS Model.Variables.object.topresizex    
    tailresizex = xmax+size; // EjsS Model.Variables.object.tailresizex

  });

  _model.addToReset(function() {
    xt = [xmax,xmax,xmax-size*2,xmax-size*2,-size*16,-size*16]; // EjsS Model.Variables.Tail.xt
    yt = [0,size/2,size/2,size,size,0]; // EjsS Model.Variables.Tail.yt
    xytail = [[xmax,0],[xmax,size/2],[xmax-size*2,size/2],[xmax-size*2,size],[-size*16,size],[-size*16,0],[xmax,0]]; // EjsS Model.Variables.Tail.xytail
    x4 = xmax/1.5-size; // EjsS Model.Variables.Tail.x4
    y4 = -4*size; // EjsS Model.Variables.Tail.y4
    td = xmax+<?php echo $sizeD;  ?>// EjsS Model.Variables.Tail.td
    td2 = td+size; // EjsS Model.Variables.Tail.td2
    h2 = size*1.2; // EjsS Model.Variables.Tail.h2
    oxtail = [xmax,xmax,xmax+td,xmax+td,xmax,xmax,xmax+td+size,xmax+td+size]; // EjsS Model.Variables.Tail.oxtail
    oytail = [y1/2-h2*2,y1/2-h2,y1/2-h2,y1/2+h2,y1/2+h2,y1/2+h2*2,y1/2+h2*2,y1/2-h2*2]; // EjsS Model.Variables.Tail.oytail
    oxytail = [[xmax,y1/2-h2*2],[xmax,y1/2-h2],[xmax+td,y1/2-h2],[xmax+td,y1/2+h2],[xmax,y1/2+h2],[xmax,y1/2+h2*2],[xmax+td+size,y1/2+h2*2],[xmax+td+size,y1/2-h2*2]]; // EjsS Model.Variables.Tail.oxytail
  });

  _model.addToReset(function() {
    showAnswerFlag = false; // EjsS Model.Variables.check.showAnswerFlag
    counter = 0; // EjsS Model.Variables.check.counter
    l_answer = ""; // EjsS Model.Variables.check.l_answer
    l_enterK1f = ""; // EjsS Model.Variables.check.l_enterK1f
    enterK1f = 0; // EjsS Model.Variables.check.enterK1f
    K1fcorrect = ""; // EjsS Model.Variables.check.K1fcorrect
    K1fcorrectbackground = ""; // EjsS Model.Variables.check.K1fcorrectbackground
  });

  _model.addToReset(function() {
    factor = 0.8; // EjsS Model.Variables.magnify.factor
    factordrag = factor*10; // EjsS Model.Variables.magnify.factordrag
    wmagnify = 100; // EjsS Model.Variables.magnify.wmagnify
    ratiomagnify = wmagnify/factor; // EjsS Model.Variables.magnify.ratiomagnify
  });

  _model.addToReset(function() {
    selected = new Array(1); // EjsS Model.Variables.layout.selected
    (function () {
      var _i0;
      for (_i0=0; _i0<1; _i0+=1) {  // EjsS Model.Variables.layout.selected
        selected[_i0] = "shm_with_xo=0,vo=2";  // EjsS Model.Variables.layout.selected
      }
    }());
    text = "drag the yellow vernier to measure length"; // EjsS Model.Variables.layout.text
    Width = (_isEPub)?"400":"100%"; // EjsS Model.Variables.layout.Width
    Height = (_isEPub)?"500":"100%"; // EjsS Model.Variables.layout.Height
    Width1 = "100%"; // EjsS Model.Variables.layout.Width1
    Width2 = "50%"; // EjsS Model.Variables.layout.Width2
    world = true; // EjsS Model.Variables.layout.world
    graph = true; // EjsS Model.Variables.layout.graph
    disabledworld = false; // EjsS Model.Variables.layout.disabledworld
    disabled = false; // EjsS Model.Variables.layout.disabled
    isAndroid = checkAndroid(); // EjsS Model.Variables.layout.isAndroid
    Android = /Android|android/i.test(navigator.userAgent); // EjsS Model.Variables.layout.Android
    iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream; // EjsS Model.Variables.layout.iOS
    iPad = /iPad/.test(navigator.userAgent) && !window.MSStream; // EjsS Model.Variables.layout.iPad
    iPhone = /iPhone|iPod/.test(navigator.userAgent) && !window.MSStream; // EjsS Model.Variables.layout.iPhone
  });

  _model.addToReset(function() {
  });

  _model.addToReset(function() {
    dragmex = size*3; // EjsS Model.Variables.dragme.dragmex
    dragmexs = dragmex; // EjsS Model.Variables.dragme.dragmexs
    dragmey = ymin*3/4; // EjsS Model.Variables.dragme.dragmey
  });

  if (_inputParameters) {
    _inputParameters = _model.parseInputParameters(_inputParameters);
    if (_inputParameters) _model.addToReset(function() { _model._readParameters(_inputParameters); });
  }

  _model.addToReset(function() {
    _privateOdesList=[];
    _ODEi_evolution1 = _ODE_evolution1();
    _privateOdesList.push(_ODEi_evolution1);
  });

  _model.addToReset(function() {
    _model.setAutoplay(false);
    _model.setPauseOnPageExit(true);
    _model.setFPS(20);
    _model.setStepsPerDisplay(1);
  });

  var dv=0;  // > CustomCode.dvalue:1
  function dvalue (v,unit) {  // > CustomCode.dvalue:2
    if(v>0)  // > CustomCode.dvalue:3
      dv=0.5;  // > CustomCode.dvalue:4
    else if(v<0)  // > CustomCode.dvalue:5
       dv=-0.5;  // > CustomCode.dvalue:6
    else   // > CustomCode.dvalue:7
      dv=0; // else dv=0.;  // > CustomCode.dvalue:8
      // > CustomCode.dvalue:9
    if (unit===0.1)  // > CustomCode.dvalue:10
      out=(parseInt(v*10.0+dv, 10)/10.0).toFixed(1);  // > CustomCode.dvalue:11
    else if (unit===0.02)  // > CustomCode.dvalue:12
      out=parseInt(v*50.0+dv,10)/50.0; // 50. instead of 50 fix bug of pointer  // > CustomCode.dvalue:13
    //else if(unit==0.05)out=((int)(v*100.+dv)/5)/20.;  // > CustomCode.dvalue:14
    else if (unit===0.05)  // > CustomCode.dvalue:15
      out=parseInt(v*20.0+dv, 10)/20.0; // by hwang to fix bug when 0.08 being read as 0.05 instead of 0.1  if the marking are 0, 0.05 0.1.  // > CustomCode.dvalue:16
    // if(unit!=0.1 && out*10-parseInt(out*10)===0)return out+"0"; //lookang 0 to address 14.00 instead of14.0  // > CustomCode.dvalue:17
    return out;  // > CustomCode.dvalue:18
  }  // > CustomCode.dvalue:19

  function showRewardVideo() {  // > CustomCode.AdsMob:1
    const e = new Event("click");  // > CustomCode.AdsMob:2
    try { // allow code to run in browser  // > CustomCode.AdsMob:3
    const element = parent.document.getElementById("banner");  // > CustomCode.AdsMob:4
    element.dispatchEvent(e);  // > CustomCode.AdsMob:5
    } catch(e) {  // > CustomCode.AdsMob:6
     const element = false;   // > CustomCode.AdsMob:7
      }  // > CustomCode.AdsMob:8
   }  // > CustomCode.AdsMob:9
   function showBannerAd() {  // > CustomCode.AdsMob:10
    const e = new Event("click");  // > CustomCode.AdsMob:11
    try { // allow code to run in browser   // > CustomCode.AdsMob:12
    const element = parent.document.getElementById("reward");  // > CustomCode.AdsMob:13
    element.dispatchEvent(e);  // > CustomCode.AdsMob:14
    } catch(e) {  // > CustomCode.AdsMob:15
     const element = false;   // > CustomCode.AdsMob:16
      }  // > CustomCode.AdsMob:17
   }  // > CustomCode.AdsMob:18
   function showInterstitialAds() {  // > CustomCode.AdsMob:19
    const e = new Event("click");  // > CustomCode.AdsMob:20
    try { // allow code to run  in browser  // > CustomCode.AdsMob:21
    const element = parent.document.getElementById("interstitial");  // > CustomCode.AdsMob:22
    element.dispatchEvent(e);  // > CustomCode.AdsMob:23
    } catch(e) {  // > CustomCode.AdsMob:24
     const element = false;   // > CustomCode.AdsMob:25
      }  // > CustomCode.AdsMob:26
   }  // > CustomCode.AdsMob:27

  var ddv=0.0;  // > CustomCode.ddvalue:1
  function ddvalue (v,unit) {  // > CustomCode.ddvalue:2
    if(v>0)  // > CustomCode.ddvalue:3
      ddv=0.5;  // > CustomCode.ddvalue:4
    else if(v<0)  // > CustomCode.ddvalue:5
      ddv=-0.5;  // > CustomCode.ddvalue:6
    else  // > CustomCode.ddvalue:7
      ddv=0;  // > CustomCode.ddvalue:8
    if(unit===0.1)  // > CustomCode.ddvalue:9
      out=parseInt(v*10.0+ddv, 10)/10.0;  // > CustomCode.ddvalue:10
     // alert(out);  // > CustomCode.ddvalue:11
    else if(unit===0.02)  // > CustomCode.ddvalue:12
      out=parseInt(v*50.0+ddv, 10)/50.0;  // > CustomCode.ddvalue:13
    //else if(unit==0.05)out=((int)(v*100.+dv)/5)/20.;  // > CustomCode.ddvalue:14
    else if(unit===0.05)  // > CustomCode.ddvalue:15
      out=parseInt(v*20.0+ddv, 10)/20.0; // by hwang to fix bug when 0.08 being read as 0.05 instead of 0.1  if the marking are 0, 0.05 0.1.  // > CustomCode.ddvalue:16
    if(unit!=0.1 && out*10-parseInt(out*10, 10)===0)  // > CustomCode.ddvalue:17
      return out*1;  // > CustomCode.ddvalue:18
    return out;  // > CustomCode.ddvalue:19
  }  // > CustomCode.ddvalue:20

  //https://developer.mozilla.org/en-US/docs/Web/Guide/API/DOM/Using_full_screen_mode  // > CustomCode.Lib Page:1
  // does not work for iOS   // > CustomCode.Lib Page:2
  /*jslint browser:true */  // > CustomCode.Lib Page:3
  function toggleFullScreen() {  // > CustomCode.Lib Page:4
    if (!document.fullscreenElement &&    // alternative standard method  // > CustomCode.Lib Page:5
        !document.mozFullScreenElement && !document.webkitFullscreenElement && !document.msFullscreenElement ) {  // current working methods  // > CustomCode.Lib Page:6
      if (document.documentElement.requestFullscreen) {  // > CustomCode.Lib Page:7
        document.documentElement.requestFullscreen();  // > CustomCode.Lib Page:8
      } else if (document.documentElement.msRequestFullscreen) {  // > CustomCode.Lib Page:9
        document.documentElement.msRequestFullscreen();  // > CustomCode.Lib Page:10
      } else if (document.documentElement.mozRequestFullScreen) {  // > CustomCode.Lib Page:11
        document.documentElement.mozRequestFullScreen();  // > CustomCode.Lib Page:12
      } else if (document.documentElement.webkitRequestFullscreen) {  // > CustomCode.Lib Page:13
        document.documentElement.webkitRequestFullscreen();  // > CustomCode.Lib Page:14
      }  // > CustomCode.Lib Page:15
    } else {  // > CustomCode.Lib Page:16
      if (document.exitFullscreen) {  // > CustomCode.Lib Page:17
        document.exitFullscreen();  // > CustomCode.Lib Page:18
      } else if (document.msExitFullscreen) {  // > CustomCode.Lib Page:19
        document.msExitFullscreen();  // > CustomCode.Lib Page:20
      } else if (document.mozCancelFullScreen) {  // > CustomCode.Lib Page:21
        document.mozCancelFullScreen();  // > CustomCode.Lib Page:22
      } else if (document.webkitExitFullscreen) {  // > CustomCode.Lib Page:23
        document.webkitExitFullscreen();  // > CustomCode.Lib Page:24
      }  // > CustomCode.Lib Page:25
    }  // > CustomCode.Lib Page:26
  }  // > CustomCode.Lib Page:27



  //code reference: http://davidwalsh.name/detect-android  // > CustomCode.checkAndroid:1
  function checkAndroid () {  // > CustomCode.checkAndroid:2
    var ua = navigator.userAgent.toLowerCase();  // > CustomCode.checkAndroid:3
    return ua.indexOf("android") > -1; //&& ua.indexOf("mobile");  // > CustomCode.checkAndroid:4
  }  // > CustomCode.checkAndroid:5

 
  function changeOrientation() {  // > CustomCode.changeOrentiaition:5
     // > CustomCode.changeOrentiaition:6
  var k =1 ; // k control height 1 is for full screen, 0.9 shorten etc  // > CustomCode.changeOrentiaition:7
  var kapple =0.95 // control apple app height  // > CustomCode.changeOrentiaition:8
  var kepub =0.95 ;  // > CustomCode.changeOrentiaition:9
  // check platform for Apps  // > CustomCode.changeOrentiaition:10
  try { // allow code to run in Student Learning Space   // > CustomCode.changeOrentiaition:11
    var iOSapp =  (typeof parent.device != 'undefined' && parent.device.platform == "iOS");  // > CustomCode.changeOrentiaition:12
    var Androidapp = (typeof parent.device != 'undefined' && parent.device.platform == "Android");  // > CustomCode.changeOrentiaition:13
  } catch(e) {  // > CustomCode.changeOrentiaition:14
    var iOSapp = false;  // > CustomCode.changeOrentiaition:15
    var Androidapp = false;  // > CustomCode.changeOrentiaition:16
  }  // > CustomCode.changeOrentiaition:17
  // check platform for web browsers  // > CustomCode.changeOrentiaition:18
  var iOS =/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;  // > CustomCode.changeOrentiaition:19
  var iPad =/iPad/.test(navigator.userAgent) && !window.MSStream;  // > CustomCode.changeOrentiaition:20
  var iPhone = /iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;  // > CustomCode.changeOrentiaition:21
  var Android= /Android|android/i.test(navigator.userAgent);  // > CustomCode.changeOrentiaition:22
  //navigator  // > CustomCode.changeOrentiaition:23
  var Firefox = navigator.userAgent.indexOf("Firefox") != -1;  // > CustomCode.changeOrentiaition:24
     // > CustomCode.changeOrentiaition:25
  switch (window.orientation) { // using window.orientation as deciding factor  // > CustomCode.changeOrentiaition:26
    case 0:  // > CustomCode.changeOrentiaition:27
    case 180:  // > CustomCode.changeOrentiaition:28
      this.screenOrientation = 'portrait';  // > CustomCode.changeOrentiaition:29
      if (iOSapp){ // does not seems to work  // > CustomCode.changeOrentiaition:30
          // > CustomCode.changeOrentiaition:31
        return window.screen.height*kapple;  //0.1 for app and 0.1 for nonfullscreenapp    // > CustomCode.changeOrentiaition:32
        // > CustomCode.changeOrentiaition:33
      }  // > CustomCode.changeOrentiaition:34
      else if (_isEPub){ // does not seems to work  // > CustomCode.changeOrentiaition:35
        //   return Math.max(window.screen.width,window.screen.height)*0.9;  // > CustomCode.changeOrentiaition:36
        return window.innerHeight*kepub;  //0.1 for app and 0.1 for nonfullscreenapp    // > CustomCode.changeOrentiaition:37
        // return window.screen.height;  // > CustomCode.changeOrentiaition:38
        //  return window.innerHeight;  // > CustomCode.changeOrentiaition:39
        // return document.documentElement.clientHeight;  // > CustomCode.changeOrentiaition:40
      }  // > CustomCode.changeOrentiaition:41
       // > CustomCode.changeOrentiaition:42
      else {  // > CustomCode.changeOrentiaition:43
         // > CustomCode.changeOrentiaition:44
        return 100*k+"vh";  // > CustomCode.changeOrentiaition:45
      }  // > CustomCode.changeOrentiaition:46
      break;  // > CustomCode.changeOrentiaition:47
    case 90:  // > CustomCode.changeOrentiaition:48
    case -90:  // > CustomCode.changeOrentiaition:49
      this.screenOrientation = 'landscape';  // > CustomCode.changeOrentiaition:50
     // > CustomCode.changeOrentiaition:51
      if (iOSapp){ // App  // > CustomCode.changeOrentiaition:52
        return window.screen.width*kapple;    // > CustomCode.changeOrentiaition:53
        // return window.screen.height;  // > CustomCode.changeOrentiaition:54
        //  return window.innerHeight;  // > CustomCode.changeOrentiaition:55
        //  return document.documentElement.clientHeight;  // > CustomCode.changeOrentiaition:56
      }  // > CustomCode.changeOrentiaition:57
      else if (_isEPub){ // does not seems to work  // > CustomCode.changeOrentiaition:58
        //   return Math.max(window.screen.width,window.screen.height)*0.9;  // > CustomCode.changeOrentiaition:59
        return window.innerHeight*kepub;  //0.1 for app and 0.1 for nonfullscreenapp    // > CustomCode.changeOrentiaition:60
        // return window.screen.height;  // > CustomCode.changeOrentiaition:61
        //  return window.innerHeight;  // > CustomCode.changeOrentiaition:62
        // return document.documentElement.clientHeight;  // > CustomCode.changeOrentiaition:63
      }  // > CustomCode.changeOrentiaition:64
       // > CustomCode.changeOrentiaition:65
      else {  // > CustomCode.changeOrentiaition:66
        return 100*k+"vh";  // > CustomCode.changeOrentiaition:67
        }  // > CustomCode.changeOrentiaition:68
      break;  // > CustomCode.changeOrentiaition:69
    default:  // > CustomCode.changeOrentiaition:70
      this.screenOrientation = 'unknown';  // > CustomCode.changeOrentiaition:71
      //       return (iPad)?""+(window.screen.width+window.screen.height)*0.4:((iPhone)?""+window.screen.width:_view._format(window.innerHeight*0.9,"0"));  // > CustomCode.changeOrentiaition:72
       if (Firefox){  // > CustomCode.changeOrentiaition:73
        return window.innerHeight*k;// number as of 20180831 Firefox does not support vh yet so need a separate line to handle  // > CustomCode.changeOrentiaition:74
        }  // > CustomCode.changeOrentiaition:75
          // > CustomCode.changeOrentiaition:76
        else {  // > CustomCode.changeOrentiaition:77
          return 100*k+"vh"; // string every other solid deployment, Android Android App web chrome etc  // > CustomCode.changeOrentiaition:78
         //  works in EjsS_5.3_180131  // > CustomCode.changeOrentiaition:79
          //return window.innerHeight*k;  // > CustomCode.changeOrentiaition:80
  }  // > CustomCode.changeOrentiaition:81
  }  // > CustomCode.changeOrentiaition:82
     // > CustomCode.changeOrentiaition:83
  }  // > CustomCode.changeOrentiaition:84

  _model.addToInitialization(function() {
    if (!__pagesEnabled["drawlowernumbers"]) return;
    for(var i=0;i<n2t;i++) {  // > Initialization.drawlowernumbers:1
      // n2t is set to 11 because 01234567890  // > Initialization.drawlowernumbers:2
      tm2t[i] = i+"";  // > Initialization.drawlowernumbers:3
      //  tm2t[i]=i+"";  // > Initialization.drawlowernumbers:4
      if(i===n2t-1)  // > Initialization.drawlowernumbers:5
        tm2t[i] = "0"; // i think is to draw 0 in place of 10  // > Initialization.drawlowernumbers:6
    }  // > Initialization.drawlowernumbers:7
    zeroxm = zerox+error*unit*dxm; // for zero error scale to move when there is zero error  // > Initialization.drawlowernumbers:8
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["App"]) return;
    try { // allow code to run in Student Learning Space   // > Initialization.App:1
       iOSapp =  (typeof parent.device != 'undefined' && parent.device.platform == "iOS");  // > Initialization.App:2
       Androidapp = (typeof parent.device != 'undefined' && parent.device.platform == "Android");  // > Initialization.App:3
    } catch(e) {  // > Initialization.App:4
       iOSapp = false;  // > Initialization.App:5
       Androidapp = false;  // > Initialization.App:6
    }  // > Initialization.App:7
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["MEssage"]) return;
    if (_isMobile){  // > Initialization.MEssage:1
      //do nothing  // > Initialization.MEssage:2
      }  // > Initialization.MEssage:3
        // > Initialization.MEssage:4
      else{  // > Initialization.MEssage:5
        // copy this into the initialization  // > Initialization.MEssage:6
    // make the font bigger  // > Initialization.MEssage:7
    _view.plottingPanel.getMessageDecoration("TL").getFont().setFontSize("1vw");  // > Initialization.MEssage:8
    _view.plottingPanel.getMessageDecoration("TR").getFont().setFontSize("1vw");  // > Initialization.MEssage:9
    _view.plottingPanel.getMessageDecoration("BL").getFont().setFontSize("1vw");  // > Initialization.MEssage:10
    _view.plottingPanel.getMessageDecoration("BR").getFont().setFontSize("2vw");  // > Initialization.MEssage:11
        }  // > Initialization.MEssage:12
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["drawupperscale"]) return;
    for(var i=0;i<nm;i++) {  // > Initialization.drawupperscale:1
      xm[i]=x2+zerox+i*dxm; //Initizlize Tab: xm=x2+zerox+i*dxm; drawing the top scale  // > Initialization.drawupperscale:2
      if(i%10==0) {  // > Initialization.drawupperscale:3
        dym[i]=y1/2;  // > Initialization.drawupperscale:4
        xmt[i/10]=xm[i];  // numbers position  // > Initialization.drawupperscale:5
        tmt[i/10]=i+"";    // texts for upper scale  // > Initialization.drawupperscale:6
      } else if(i%5==0)dym[i]=y1/4+size/2;  // > Initialization.drawupperscale:7
      else dym[i]=y1/4;  // > Initialization.drawupperscale:8
    }  // > Initialization.drawupperscale:9
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["mode"]) return;
    // edit here for starting option cm currently  // > Initialization.mode:1
      dx2=9*dxm/20; // smaller means smaller widrh of vernier scale  // > Initialization.mode:2
      n2s=21;  // > Initialization.mode:3
      dycst=0.;  // > Initialization.mode:4
      nmode=2;  // > Initialization.mode:5
      L=10*dxm+size; // control length of veriner  // > Initialization.mode:6
      // added by wee for left right button  // > Initialization.mode:7
      // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10  // > Initialization.mode:8
      // increment = dxm/10 ;  // > Initialization.mode:9
      // l_unit="0.1mm";  // > Initialization.mode:10
      unit=0.1;  // > Initialization.mode:11
      increment = dxm/(1/unit);  // > Initialization.mode:12
      cmshow=true;  // > Initialization.mode:13
    l_unit=unit+"mm";  // > Initialization.mode:14
    x6[4]=x6[5]=x2+L;  // > Initialization.mode:15
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["mode 2"]) return;
    var option = _view.comboBox.getProperty("SelectedOptions");  // array of options  // > Initialization.mode 2:1
    if(option=="0.02 mm v1") {  // > Initialization.mode 2:2
      dycst=1.;  // > Initialization.mode 2:3
      n2s=51;  // > Initialization.mode 2:4
      dx2=49*dxm/50;  // > Initialization.mode 2:5
      nmode=5;  // > Initialization.mode 2:6
      L=50*dxm+size;  // > Initialization.mode 2:7
      unit=0.02;  // > Initialization.mode 2:8
      increment = dxm/(1/unit);  // > Initialization.mode 2:9
      cmshow=false;  // > Initialization.mode 2:10
    }  // > Initialization.mode 2:11
    else if(option=="0.1 mm v1") {  // > Initialization.mode 2:12
      dycst=0.;  // > Initialization.mode 2:13
      n2s=51;  // > Initialization.mode 2:14
      dx2=49*dxm/50;  // > Initialization.mode 2:15
      nmode=5;  // > Initialization.mode 2:16
      L=50*dxm+size;  // > Initialization.mode 2:17
      unit=0.1;  // > Initialization.mode 2:18
      increment = dxm/(1/unit);  // > Initialization.mode 2:19
      cmshow=false;  // > Initialization.mode 2:20
    }  // > Initialization.mode 2:21
    else if(option=="0.05 mm v1") {  // > Initialization.mode 2:22
      dx2=39*dxm/40*2; // control the spacing of the numbers on lower scale  // > Initialization.mode 2:23
      n2s=21; // number of intervals on the lower scale  // > Initialization.mode 2:24
      dycst=1.; // dycst=0; no minor ticks. dycst=1; draw minus ticks.  // > Initialization.mode 2:25
      nmode=2; // numbers position align with the ticks on lower scale  // > Initialization.mode 2:26
      L=40*dxm+size; // control the size of the lower scale in x direction  // > Initialization.mode 2:27
      // l_unit="0.05mm";  // > Initialization.mode 2:28
      unit=0.05;  // > Initialization.mode 2:29
      increment = dxm/(1/unit);  // > Initialization.mode 2:30
      cmshow=false;  // > Initialization.mode 2:31
    }  // > Initialization.mode 2:32
    else if(option=="0.1 mm v2") {  // > Initialization.mode 2:33
      dx2=39*dxm/40*2;  // > Initialization.mode 2:34
      n2s=21;  // > Initialization.mode 2:35
      dycst=0.;  // > Initialization.mode 2:36
      nmode=2;  // > Initialization.mode 2:37
      L=40*dxm+size;  // > Initialization.mode 2:38
      unit=0.1;  // > Initialization.mode 2:39
      increment = dxm/(1/unit);  // > Initialization.mode 2:40
      cmshow=false;  // > Initialization.mode 2:41
    }  // > Initialization.mode 2:42
    else if(option=="0.05 mm v2") {  // > Initialization.mode 2:43
      dx2=19*dxm/20;  // > Initialization.mode 2:44
      n2s=21;  // > Initialization.mode 2:45
      dycst=1.;  // > Initialization.mode 2:46
      nmode=2;  // > Initialization.mode 2:47
      L=20*dxm+size;  // > Initialization.mode 2:48
      // added by wee for left right button  // > Initialization.mode 2:49
      // increment = 0.25718;// take 257.16 divide 50 mm divide 20  // > Initialization.mode 2:50
      //  increment = dxm/20 ;  // > Initialization.mode 2:51
      // l_unit="0.05mm";  // > Initialization.mode 2:52
      unit=0.05;  // > Initialization.mode 2:53
      increment = dxm/(1/unit);  // > Initialization.mode 2:54
      cmshow=false;  // > Initialization.mode 2:55
    }  // > Initialization.mode 2:56
    else if(option=="0.1 mm v3") {  // > Initialization.mode 2:57
      dx2=19*dxm/20;  // > Initialization.mode 2:58
      n2s=21;  // > Initialization.mode 2:59
      dycst=0.;  // > Initialization.mode 2:60
      nmode=2;  // > Initialization.mode 2:61
      L=20*dxm+size;  // > Initialization.mode 2:62
      // added by wee for left right button  // > Initialization.mode 2:63
      // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10  // > Initialization.mode 2:64
      // increment = dxm/10 ;  // > Initialization.mode 2:65
      // l_unit="0.1mm";  // > Initialization.mode 2:66
      unit=0.1;  // > Initialization.mode 2:67
      increment = dxm/(1/unit);  // > Initialization.mode 2:68
      cmshow=false;  // > Initialization.mode 2:69
    }  // > Initialization.mode 2:70
    //lookang adding  // > Initialization.mode 2:71
    else if(option=="0.1 mm v4") {// added due to request by another version 0.1 mm Vernier constant where 10 divisions of vernier will coincide will 9 divisions of the main scale. {  // > Initialization.mode 2:72
      dx2=9*dxm/20; // smaller means smaller widrh of vernier scale  // > Initialization.mode 2:73
      n2s=21;  // > Initialization.mode 2:74
      dycst=0.;  // > Initialization.mode 2:75
      nmode=2;  // > Initialization.mode 2:76
      L=10*dxm+size; // control length of veriner  // > Initialization.mode 2:77
      // added by wee for left right button  // > Initialization.mode 2:78
      // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10  // > Initialization.mode 2:79
      // increment = dxm/10 ;  // > Initialization.mode 2:80
      // l_unit="0.1mm";  // > Initialization.mode 2:81
      unit=0.1;  // > Initialization.mode 2:82
      increment = dxm/(1/unit);  // > Initialization.mode 2:83
      cmshow=false;  // > Initialization.mode 2:84
    }  // > Initialization.mode 2:85
    else if(option=="cm show") {// added due to request by another version 0.1 mm Vernier constant where 10 divisions of vernier will coincide will 9 divisions of the main scale. {  // > Initialization.mode 2:86
      dx2=9*dxm/20; // smaller means smaller widrh of vernier scale  // > Initialization.mode 2:87
      n2s=21;  // > Initialization.mode 2:88
      dycst=0.;  // > Initialization.mode 2:89
      nmode=2;  // > Initialization.mode 2:90
      L=10*dxm+size; // control length of veriner  // > Initialization.mode 2:91
      // added by wee for left right button  // > Initialization.mode 2:92
      // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10  // > Initialization.mode 2:93
      // increment = dxm/10 ;  // > Initialization.mode 2:94
      // l_unit="0.1mm";  // > Initialization.mode 2:95
      unit=0.1;  // > Initialization.mode 2:96
      increment = dxm/(1/unit);  // > Initialization.mode 2:97
      cmshow=true;  // > Initialization.mode 2:98
    }  // > Initialization.mode 2:99
    l_unit=unit+"mm";  // > Initialization.mode 2:100
    x6[4]=x6[5]=x2+L;  // > Initialization.mode 2:101
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["smallestunitshow"]) return;
    l_unit2=l_unit;  // > Initialization.smallestunitshow:1
    // to initialize to appear at beginning of simulation start  // > Initialization.smallestunitshow:2
    text1 =""+dvalue(parseInt(x/dxm),unit);  // > Initialization.smallestunitshow:3
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["undefined"]) return;
    if (dragemetrue==undefined){  // > Initialization.undefined:1
      dragemetrue=false;  // > Initialization.undefined:2
      }   // > Initialization.undefined:3
      if (dragemetrue2==undefined){  // > Initialization.undefined:4
      dragemetrue2=false;  // > Initialization.undefined:5
      }  // > Initialization.undefined:6
        // > Initialization.undefined:7
        // > Initialization.undefined:8
    if (oy==undefined){  // > Initialization.undefined:9
      oy=y0 + 20;  // > Initialization.undefined:10
      }    // > Initialization.undefined:11
      if (xmagnify==undefined){  // > Initialization.undefined:12
      xmagnify=-50;  // > Initialization.undefined:13
      }   // > Initialization.undefined:14
       // > Initialization.undefined:15
     //show  // > Initialization.undefined:16
     if (show==undefined){  // > Initialization.undefined:17
      show=false;  // > Initialization.undefined:18
      }   // > Initialization.undefined:19
      if (showhint==undefined){  // > Initialization.undefined:20
      showhint=false;  // > Initialization.undefined:21
      }  // > Initialization.undefined:22
        // > Initialization.undefined:23
      //objects  // > Initialization.undefined:24
      if (topone==undefined){  // > Initialization.undefined:25
      topone=false;  // > Initialization.undefined:26
      }  // > Initialization.undefined:27
      if (botone==undefined){  // > Initialization.undefined:28
      botone=true;  // > Initialization.undefined:29
      }  // > Initialization.undefined:30
       if (tail==undefined){  // > Initialization.undefined:31
      tail=false;  // > Initialization.undefined:32
      }  // > Initialization.undefined:33
       // > Initialization.undefined:34
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["svg"]) return;
    var container = document.createElement('div');  // > Initialization.svg:1
    var svggradient = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1"><defs>'+  // > Initialization.svg:2
      '  <radialGradient id="mygrandient" cx="50%" cy="50%" r="80%" fx="30%" fy="30%">'+  // > Initialization.svg:3
      '    <stop offset="0%" style="stop-color:rgb(0,255,255); stop-opacity:1" />'+  // > Initialization.svg:4
      '    <stop offset="100%" style="stop-color:rgb(0,0,255);stop-opacity:1" />'+  // > Initialization.svg:5
      '  </radialGradient>'+  // > Initialization.svg:6
      '</defs></svg>';  // > Initialization.svg:7
    container.innerHTML = svggradient;  // > Initialization.svg:8
    document.body.appendChild(container);  // > Initialization.svg:9
    //"url(#mygrandient)"  // > Initialization.svg:10
    var container = document.createElement('div');  // > Initialization.svg:11
    var svggradient = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1"><defs>'+  // > Initialization.svg:12
      '  <radialGradient id="mygrandient1" cx="50%" cy="50%" r="80%" fx="30%" fy="30%">'+  // > Initialization.svg:13
      '    <stop offset="0%" style="stop-color:rgb(255,255,255); stop-opacity:1" />'+  // > Initialization.svg:14
      '    <stop offset="100%" style="stop-color:rgb(192,192,192);stop-opacity:1" />'+  // > Initialization.svg:15
      '  </radialGradient>'+  // > Initialization.svg:16
      '</defs></svg>';  // > Initialization.svg:17
    container.innerHTML = svggradient;  // > Initialization.svg:18
    document.body.appendChild(container);  // > Initialization.svg:19
    //"url(#mygrandient1)"  // > Initialization.svg:20
    var container = document.createElement('div');  // > Initialization.svg:21
    var svggradient = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1"><defs>'+  // > Initialization.svg:22
      '  <radialGradient id="mygrandient2" cx="50%" cy="50%" r="80%" fx="30%" fy="30%">'+  // > Initialization.svg:23
      '    <stop offset="0%" style="stop-color:rgb(128,128,138); stop-opacity:1" />'+  // > Initialization.svg:24
      '    <stop offset="100%" style="stop-color:rgb(0,0,0);stop-opacity:1" />'+  // > Initialization.svg:25
      '  </radialGradient>'+  // > Initialization.svg:26
      '</defs></svg>';  // > Initialization.svg:27
    container.innerHTML = svggradient;  // > Initialization.svg:28
    document.body.appendChild(container);  // > Initialization.svg:29
    //"url(#mygrandient2)"  // > Initialization.svg:30
    var container = document.createElement('div');  // > Initialization.svg:31
    var svggradient = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1"><defs>'+  // > Initialization.svg:32
      '  <radialGradient id="mygrandient3" cx="50%" cy="50%" r="80%" fx="30%" fy="30%">'+  // > Initialization.svg:33
      '    <stop offset="0%" style="stop-color:rgb(200,208,228); stop-opacity:1" />'+  // > Initialization.svg:34
      '    <stop offset="100%" style="stop-color:rgb(0,0,0);stop-opacity:1" />'+  // > Initialization.svg:35
      '  </radialGradient>'+  // > Initialization.svg:36
      '</defs></svg>';  // > Initialization.svg:37
    container.innerHTML = svggradient;  // > Initialization.svg:38
    document.body.appendChild(container);  // > Initialization.svg:39
    //"url(#mygrandient3)" "rgba(200,220,208,1)"  // > Initialization.svg:40
    var container = document.createElement('div');  // > Initialization.svg:41
    var svggradient = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1"><defs>'+  // > Initialization.svg:42
      '  <radialGradient id="mygrandient4" cx="50%" cy="50%" r="80%" fx="30%" fy="30%">'+  // > Initialization.svg:43
      '    <stop offset="0%" style="stop-color:rgb(192,192,202); stop-opacity:1" />'+  // > Initialization.svg:44
      '    <stop offset="100%" style="stop-color:rgb(255,255,255);stop-opacity:1" />'+  // > Initialization.svg:45
      '  </radialGradient>'+  // > Initialization.svg:46
      '</defs></svg>';  // > Initialization.svg:47
    container.innerHTML = svggradient;  // > Initialization.svg:48
    document.body.appendChild(container);  // > Initialization.svg:49
    //"url(#mygrandient4)" "rgba(200,220,208,1)"  // > Initialization.svg:50
    // "url(#mygrandientgolden)"   // > Initialization.svg:51
    var container = document.createElement('div');  // > Initialization.svg:52
    var svggradient = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1"><defs>'+  // > Initialization.svg:53
      '  <radialGradient id="mygrandientgolden" cx="50%" cy="50%" r="80%" fx="30%" fy="30%">'+  // > Initialization.svg:54
      '    <stop offset="0%" style="stop-color:rgb(255,255,255); stop-opacity:1" />'+  // > Initialization.svg:55
      '    <stop offset="100%" style="stop-color:rgb(0,250,255);stop-opacity:0" />'+  // > Initialization.svg:56
      '  </radialGradient>'+  // > Initialization.svg:57
      '</defs></svg>';  // > Initialization.svg:58
    container.innerHTML = svggradient;  // > Initialization.svg:59
    document.body.appendChild(container);  // > Initialization.svg:60
  });

  _model.addToInitialization(function() {
    _initializeSolvers();
  });

  _model.addToEvolution(function() {
    if (!__pagesEnabled["Evol Page"]) return;
    _ODEi_evolution1.step();
  });

  _model.addToFixedRelations(function() { _isPaused = _model.isPaused(); _isPlaying = _model.isPlaying(); });

  _model.addToFixedRelations(function() {
    if (!__pagesEnabled["object"]) return;
    oxmax=oxmin+x;  // > FixedRelations.object:1
    bottomresizex = w; // sync drag resize added by lookang  // > FixedRelations.object:2

    //bottomresizex = ox+w/2; // sync drag resize added by lookang  // > FixedRelations.object:2
    // to check boundary of blue object with the parts of the vernier caliper  // > FixedRelations.object:3
    if((ox-w/2>oxmin-20) && (ox+w/2<oxmax+20) && (oy+h/2>oymin))  // > FixedRelations.object:4
      outobject=false;  // > FixedRelations.object:5
    else  // > FixedRelations.object:6
      outobject = true;  // > FixedRelations.object:7
    if((ox-w/2<=oxmin) && (oy+h/2-oymin)>0) {  // > FixedRelations.object:8
      // check left boundary true  // > FixedRelations.object:9
      ox=oxmin+w/2;  // > FixedRelations.object:10
      if((x2+x<=ox+w/2) && (oy>oymin-h/2)) {  // > FixedRelations.object:11
        // check object and jaws to stop motion&& object y above object y minimum  // > FixedRelations.object:12
        x=w;  // > FixedRelations.object:13
        xdrag=-160+x; // added code to force alignment between  x and xdrag used in new implementation  // > FixedRelations.object:14
      }  // > FixedRelations.object:15
    }  // > FixedRelations.object:16
    if(x<0)  // > FixedRelations.object:17
      x=0; // for the 2 jaws to meet at zero  // > FixedRelations.object:18
    // old code b4 suggest by wolfgang  // > FixedRelations.object:19
    else if((ox>x2+x-w/2) && (oy>oymin-h/2) && (oy<=oymax-h/2)) {  // > FixedRelations.object:20
      // right jaw hit object and inside jaws  // > FixedRelations.object:21
      ox=x2+x-w/2; // to force the blue object into the open jaws  // > FixedRelations.object:22
    //  xdrag=-160+x; // added code to force alignment between  x and xdrag used in new implementation  // > FixedRelations.object:23
    }  // > FixedRelations.object:24
    if(oy>=oymax-h/2)  // > FixedRelations.object:25
      oy=oymax-h/2; // check top boundary codes changes to suit lookang thinking  // > FixedRelations.object:26
    // xdmin=ox+d+w/2; // define with xdmin means  // > FixedRelations.object:27
    xdmin=ox+d+w/2; // define with xdmin means  // > FixedRelations.object:28
    if(botone) {  // > FixedRelations.object:29
      //set bottomdragme object width  // > FixedRelations.object:30
      if (w < bottomdragmesizemax){  // > FixedRelations.object:31
        bottomdragmesize = w;  // > FixedRelations.object:32
      } else {  // > FixedRelations.object:33
        bottomdragmesize = bottomdragmesizemax;  // > FixedRelations.object:34
      }  // > FixedRelations.object:35
    }  // > FixedRelations.object:36
    if(topone) {  // > FixedRelations.object:37
      if(x>=b) {  // > FixedRelations.object:38
        x=b;  // > FixedRelations.object:39
        xdrag=-160+x; // added code to force alignment between  x and xdrag used in new implementation  // > FixedRelations.object:40
        if ((ox>x2+x-w/2) && (oy>oymin-h/2)) {  // > FixedRelations.object:41
          // check blue touch jaw touch green  // > FixedRelations.object:42
          ox=x0+a+b-w/2; // force object x to be fixed just enough like blocked  // > FixedRelations.object:43
        }  // > FixedRelations.object:44
      } // block upper jaw on green object as jaw move  // > FixedRelations.object:45
      pxy[2][0]=pxy[1][0]=px[2]=px[1]=x0+2*a+b; // extreme right corner outer  // > FixedRelations.object:46
      pxy[3][0]=pxy[4][0]=px[3]=px[4]=x0+a+b;  // extreme right corner inner  // > FixedRelations.object:47
    }  // > FixedRelations.object:48
    // for tail hitting the inside depth of the object tube  // > FixedRelations.object:49
    // td is initialised to be >xmax.  // > FixedRelations.object:50
    // x value should only be set to when td is > xmax  // > FixedRelations.object:51
    if(tail) {  // > FixedRelations.object:52
      oxytail[2][0] = oxytail[3][0] = oxtail[2]=oxtail[3]=td;   // > FixedRelations.object:53
      oxytail[6][0] = oxytail[7][0] = oxtail[6]=oxtail[7]=td+size;  // > FixedRelations.object:54
      if (testMode) {
        tailresizex=  xmax+<?php echo $sizeD;  ?>; // force sync between td and resizetail   // > FixedRelations.object:55
      }else{
        tailresizex = td;
      }
     //console.log(tailresizex,td)
      if(x>=td-xmax) {   // > FixedRelations.object:56
        x=td-xmax;  // > FixedRelations.object:57
        xdrag=-160+x; // added code to force alignment between  x and xdrag used in new implementation  // > FixedRelations.object:58
      }  // > FixedRelations.object:59
    }  // > FixedRelations.object:60
  });

  _model.addToFixedRelations(function() {
    if (!__pagesEnabled["topscaleneedredrawing"]) return;
    for(var i=0;i<nm;i++){  // > FixedRelations.topscaleneedredrawing:1
     xm[i]=x2+zerox+i*dxm; //Initizlize Tab: xm=x2+zerox+i*dxm; drawing the top scale  // > FixedRelations.topscaleneedredrawing:2
     if(i%10==0){  // > FixedRelations.topscaleneedredrawing:3
      dym[i]=y1/2;  // > FixedRelations.topscaleneedredrawing:4
      xmt[i/10]=xm[i];  // numbers position  // > FixedRelations.topscaleneedredrawing:5
    // for cm and mm  // > FixedRelations.topscaleneedredrawing:6
     if (cmshow==false){  // > FixedRelations.topscaleneedredrawing:7
    tmt[i/10]=i+"";    // texts for upper scale  // > FixedRelations.topscaleneedredrawing:8
    }  // > FixedRelations.topscaleneedredrawing:9
    else if (cmshow==true){ // request by techers for cm  // > FixedRelations.topscaleneedredrawing:10
    tmt[i/10]=i/10+"";    // texts for upper scale  // > FixedRelations.topscaleneedredrawing:11
    }  // > FixedRelations.topscaleneedredrawing:12
    }else if(i%5==0)dym[i]=y1/4+size/2;  // > FixedRelations.topscaleneedredrawing:13
     else dym[i]=y1/4;  // > FixedRelations.topscaleneedredrawing:14
    }  // > FixedRelations.topscaleneedredrawing:15
  });

  _model.addToFixedRelations(function() {
    if (!__pagesEnabled["answer"]) return;
    zero=0;  // > FixedRelations.answer:1
    //xpt=xm[Math.floor(out+error * unit)]; // new codes by lookang in javascript  // > FixedRelations.answer:2
    xm2t[0]=x2+x+zeroxm+0*0; // does not work to force lower scale numbers to stick to lower scale  // > FixedRelations.answer:3
    // for spacings  // > FixedRelations.answer:4
    for(var i=0;i<n2s;i++){  // > FixedRelations.answer:5
     xm2[i]=x2+zeroxm+i*dx2+x; // spacings in lower scale  // > FixedRelations.answer:6
    if(i%nmode==0){  // > FixedRelations.answer:7
       dy2[i]=-y1/4; // inbetween lines shorter   // > FixedRelations.answer:8
       xm2t[i/nmode]=xm2[i]; // numbers on lower scale x spacing  // > FixedRelations.answer:9
      }  // > FixedRelations.answer:10
      else dy2[i]=-y1/8*dycst;  // > FixedRelations.answer:11
    }  // > FixedRelations.answer:12
    //l_x=_view._format(dvalue(x/dxm,unit),"0.00")+"mm";//+unit+":"; // l_x is the label for the final answer  // > FixedRelations.answer:13
    answer = ddvalue(x/dxm,unit); // answer is the double for check  // > FixedRelations.answer:14
    l_answer= dvalue(x/dxm,unit)+"";  // > FixedRelations.answer:15
    if(unit==0.1){  // > FixedRelations.answer:16
      // out is the same as my vss, it is the top number  // > FixedRelations.answer:17
     vs=parseInt(out/unit+0.5)-parseInt(out)*10+error;  // > FixedRelations.answer:18
     // vs=parseInt((parseInt(out*100)-100*parseInt(out))/(unit*100)+0.5)+error;  // > FixedRelations.answer:19
      if(vs>n2s-2-10)vs-=(n2s-1-10); // bug fixed n2s =11 for unit ===0.1  // > FixedRelations.answer:20
      else if(vs<0)vs+=(n2s-1-10);  // > FixedRelations.answer:21
      // adding this code to solve array out of bound error 803  // > FixedRelations.answer:22
      // http://www.phy.ntnu.edu.tw/ntnujava/index.php?topic=1183.0 solution discussed  // > FixedRelations.answer:23
    //  if(vs>-1 && vs<n2t)vsidarray=vs;  // > FixedRelations.answer:24
    //  else vsidarray=0;// or other valid values.  // > FixedRelations.answer:25
      // this line is causing array ou of bound error 803  // > FixedRelations.answer:26
      xp=xm2t[vs]; // this is the way to determine position of lower scale pointer  // > FixedRelations.answer:27
      //xp=xm2t[vsidarray];  // > FixedRelations.answer:28
    }  // > FixedRelations.answer:29
    // added by wee to fix bug 0.08 show as 0.05 instead of 0.1  // > FixedRelations.answer:30
    //out is output answer  // > FixedRelations.answer:31
    //error*unit is zero error  // > FixedRelations.answer:32
    //vs is counter of vernier  // > FixedRelations.answer:33
    else{  // > FixedRelations.answer:34
     vs=parseInt((parseInt(out*100)-100*parseInt(out))/(unit*100)+0.5)+error; // vs is the counter of number of scale right of 0 for the lower scale  // > FixedRelations.answer:35
     if(vs>n2s-2)vs-=(n2s-1);  // > FixedRelations.answer:36
     else if(vs<0)vs+=(n2s-1);  // > FixedRelations.answer:37
     xp=xm2[vs]; // this is the way to determine position of lower scale pointer  // > FixedRelations.answer:38
    }  // > FixedRelations.answer:39
    if(vs>51)vs=0; // vs greater 51 than reset to 0 becuase 50 tickers  // > FixedRelations.answer:40
    //hints working  // > FixedRelations.answer:41
    //xpt is magenta hint  // > FixedRelations.answer:42
     //xpt=xm[Math.floor(out+error * unit)]; // new codes by lookang in javascript to work for hints without show/answer  // > FixedRelations.answer:43
     //xpt=xm[parseInt(out+error * unit)];  // > FixedRelations.answer:44
     xpt=xm[parseInt(answer+error * unit)];  // > FixedRelations.answer:45
      text2 = dvalue(vs*unit,unit);  // > FixedRelations.answer:46
    //  text2cm = dvalue(vs*unit/10,unit);  // > FixedRelations.answer:47
      text2cm = (dvalue(vs*unit,unit)/10).toFixed(2);  // > FixedRelations.answer:48
    if(show){  // > FixedRelations.answer:49
      l_unit2=l_unit;   // > FixedRelations.answer:50
       // > FixedRelations.answer:51
      //pointer  // > FixedRelations.answer:52
     // vss = parseInt((x / dxm + error * unit + 2.0e-2)); // introduce to point to include zero error and debug need + 1.0e-2 for cases where there may be error is calculation  // > FixedRelations.answer:53
       // > FixedRelations.answer:54
     //   vss = parseInt((x / dxm + error * unit )); // introduce to point to include zero error and debug need + 1.0e-2 for cases where there may be error is calculation  // > FixedRelations.answer:55
      vss = parseInt((x / dxm + error * unit ));  // > FixedRelations.answer:56
      //vss = (int)(x/dxm); // old code without zero error  // > FixedRelations.answer:57
     // if (vss > -1 && vss < nm) vssidarray = vss;  // > FixedRelations.answer:58
     // else vssidarray = 0; // or other valid values.  // > FixedRelations.answer:59
    //  xpt=xm[vss]; // x point  // > FixedRelations.answer:60
    //   xpt=xm[Math.floor(out+error * unit)]; // new codes by lookang in javascript  // > FixedRelations.answer:61
     // xpt=xm[vssidarray];   // > FixedRelations.answer:62
     // if (!cmshow){  // > FixedRelations.answer:63
     // text2 = dvalue(vs*unit,unit);  // > FixedRelations.answer:64
    //  text2cm = dvalue(vs*unit/10,unit);  // > FixedRelations.answer:65
    //  text2cm = (dvalue(vs*unit,unit)/10).toFixed(2);  // > FixedRelations.answer:66
    //}  // > FixedRelations.answer:67
    //else if (cmshow){  // > FixedRelations.answer:68
     // text2 = dvalue(vs*unit/10,unit);  // > FixedRelations.answer:69
     // }  // > FixedRelations.answer:70
    if (cmshow==false){  // > FixedRelations.answer:71
    // l_x="d=" + _view._format(dvalue(parseInt(x/dxm+error * unit),unit),"0.00")+ "+" +_view._format(vs*unit,"0.00")+ "-(" + _view._format(dvalue(+error*unit,unit),"0.00")+ ") = " +_view._format(dvalue(x/dxm,unit),"0.00")+"mm";  // > FixedRelations.answer:72
    l_x="d=" + _view._format(Math.floor(answer+error*unit),"0.0")+ "+" +_view._format(vs*unit,"0.00")+ "-(" + _view._format(dvalue(+error*unit,unit),"0.00")+ ") = " +_view._format(dvalue(x/dxm,unit),"0.00")+"mm";  // > FixedRelations.answer:73
    }  // > FixedRelations.answer:74
    else if (cmshow=true){  // > FixedRelations.answer:75
    //  l_x="d=" + _view._format(dvalue(parseInt(x/dxm+error * unit),unit)/10,"0.00")+ "+" +_view._format(vs*unit/10,"0.00")+ "-(" + _view._format(dvalue(+error*unit,unit)/10,"0.00")+ ") = " +_view._format(dvalue(x/dxm,unit)/10,"0.00")+"cm";  // > FixedRelations.answer:76
    l_x="d=" + _view._format(Math.floor(answer+error*unit)/10,"0.0")+ "+" +_view._format(vs*unit/10,"0.00")+ "-(" + _view._format(dvalue(+error*unit,unit)/10,"0.00")+ ") = " +_view._format(dvalue(x/dxm,unit)/10,"0.00")+"cm";  // > FixedRelations.answer:77
    //  // > FixedRelations.answer:78
      }  // > FixedRelations.answer:79
          // > FixedRelations.answer:80
    } // for show  // > FixedRelations.answer:81
    else {  // > FixedRelations.answer:82
      l_x="d= ??? mm";  // added to make the answer show ??? all the time  // > FixedRelations.answer:83
    }   // > FixedRelations.answer:84
  });

  _model.addToFixedRelations(function() {
    if (!__pagesEnabled["checkmm"]) return;
    if (showAnswerFlag===false){   // > FixedRelations.checkmm:1
    K1fcorrect = "";  // > FixedRelations.checkmm:2
    }  // > FixedRelations.checkmm:3
    else {  // > FixedRelations.checkmm:4
    //  if(l_answer===l_enterK1f){  // > FixedRelations.checkmm:5
      // mm  // > FixedRelations.checkmm:6
     if((l_enterK1f===_view._format(l_answer,"0.0"))&&(unit===0.1)&&!cmshow){  // > FixedRelations.checkmm:7
       K1fcorrect = "Great! You have the right answer!";  // > FixedRelations.checkmm:8
    K1fcorrectbackground = "rgba(0,255,0,255)";  // > FixedRelations.checkmm:9
    }  // > FixedRelations.checkmm:10
    //cm and unit =0.1  // > FixedRelations.checkmm:11
    else if((l_enterK1f===_view._format(l_answer/10,"0.00"))&&(unit===0.1)&&cmshow){  // > FixedRelations.checkmm:12
    //  else if((l_enterK1f*10==l_answer.toFixed(2))&&(unit===0.1)&&cmshow){  // > FixedRelations.checkmm:13
       K1fcorrect = "Great! You have the right answer!";  // > FixedRelations.checkmm:14
    K1fcorrectbackground = "rgba(0,255,0,255)";  // > FixedRelations.checkmm:15
    }  // > FixedRelations.checkmm:16
    //mm  // > FixedRelations.checkmm:17
    else if((l_enterK1f===_view._format(l_answer,"0.00"))&&(unit<0.1)&&!cmshow){  // > FixedRelations.checkmm:18
       K1fcorrect = "Great! You have the right answer!";  // > FixedRelations.checkmm:19
    K1fcorrectbackground = "rgba(0,255,0,255)";  // > FixedRelations.checkmm:20
    }  // > FixedRelations.checkmm:21
    //cm  // > FixedRelations.checkmm:22
    else if((l_enterK1f===_view._format(l_answer,"0.00"))&&(unit<0.1)&&!cmshow){  // > FixedRelations.checkmm:23
       K1fcorrect = "Great! You have the right answer!";  // > FixedRelations.checkmm:24
    K1fcorrectbackground = "rgba(0,255,0,255)";  // > FixedRelations.checkmm:25
    }  // > FixedRelations.checkmm:26
    //wrong dp  // > FixedRelations.checkmm:27
       // > FixedRelations.checkmm:28
    else {  // > FixedRelations.checkmm:29
    // if(Math.abs(answer-l_enterK1f)<1.e-7&&!cmshow){// same value but different digits or incorrect format  // > FixedRelations.checkmm:30
    if((Math.abs(answer-l_enterK1f)<1.e-7&&!cmshow)||(Math.abs(answer-l_enterK1f*10)<1.e-7&&cmshow)){  // > FixedRelations.checkmm:31
    //K1fcorrect = " Check the number of digits ";  // > FixedRelations.checkmm:32
    K1fcorrect = " Check the number of digits ";  // > FixedRelations.checkmm:33
    K1fcorrectbackground = "rgba(255,200,0,255)";  // > FixedRelations.checkmm:34
     }  // > FixedRelations.checkmm:35
     else if (!cmshow) {  // > FixedRelations.checkmm:36
    K1fcorrect = " Incorrect, Your input is out by "+ _view._format(answer-l_enterK1f,"0.00") + " mm";  // > FixedRelations.checkmm:37
    K1fcorrectbackground = "rgba(255,0,0,255)";  // > FixedRelations.checkmm:38
     }  // > FixedRelations.checkmm:39
    // else if (cmshow) {  // > FixedRelations.checkmm:40
     else  {  // > FixedRelations.checkmm:41
    //K1fcorrect = " Incorrect, Your input is out by "+ _view._format(answer-l_enterK1f,"0.0") ;  // > FixedRelations.checkmm:42
    K1fcorrect = " Incorrect, Your input is out by "+ (answer/10-l_enterK1f).toFixed(2) + " cm";  // > FixedRelations.checkmm:43
    K1fcorrectbackground = "rgba(255,0,0,255)";  // > FixedRelations.checkmm:44
     }  // > FixedRelations.checkmm:45
    }  // > FixedRelations.checkmm:46
    if(parent.cordova&&counter>0) { // check it is running in Android  // > FixedRelations.checkmm:47
           parent.TTS.speak(K1fcorrect, function () {  // > FixedRelations.checkmm:48
                // success  // > FixedRelations.checkmm:49
            }, function (reason) {  // > FixedRelations.checkmm:50
                // error  // > FixedRelations.checkmm:51
            });  // > FixedRelations.checkmm:52
        }  // > FixedRelations.checkmm:53
        else if (!parent.cordova&&counter>0){  // > FixedRelations.checkmm:54
      var msg2 = new SpeechSynthesisUtterance(K1fcorrect);  // > FixedRelations.checkmm:55
    window.speechSynthesis.speak(msg2);  // > FixedRelations.checkmm:56
    }  // > FixedRelations.checkmm:57
    counter =0; // make speak once  // > FixedRelations.checkmm:58
    showAnswerFlag=false; // set back to false  // > FixedRelations.checkmm:59
    }  // > FixedRelations.checkmm:60
  });

  _model.addToFixedRelations(function() {
    if (!__pagesEnabled["magnify"]) return;
    //xmin = (xmin-0)*zoom;  // > FixedRelations.magnify:1
    //xmax = (xmax-0)*zoom;  // > FixedRelations.magnify:2
    //ymin = (ymin-0)*zoom;  // > FixedRelations.magnify:3
    //ymax =  (ymax-0)*zoom;  // > FixedRelations.magnify:4
    if (showmagnify ===true) // to make magnify enable only after show ==true  // > FixedRelations.magnify:5
    {  // > FixedRelations.magnify:6
      //xmagnify=xp;  // > FixedRelations.magnify:7
      ymagnify=0;  // > FixedRelations.magnify:8
      }  // > FixedRelations.magnify:9
      else {  // > FixedRelations.magnify:10
       // xmagnify=0; // shift back to default centre?  // > FixedRelations.magnify:11
      ymagnify=0;  // > FixedRelations.magnify:12
        }  // > FixedRelations.magnify:13
    if (xmagnify >xmax*3/4)xmagnify = xmax*3/4; // prevent magnifer from going beyond  // > FixedRelations.magnify:14
    if (xmagnify <xmin*3/4)xmagnify = xmin*3/4;  // > FixedRelations.magnify:15
    if (ymagnify >ymax*3/4)ymagnify = ymax*3/4;  // > FixedRelations.magnify:16
    if (ymagnify <ymin*3/4)ymagnify = ymin*3/4;  // > FixedRelations.magnify:17
        // > FixedRelations.magnify:18
  });

  _model.addToFixedRelations(function() { _isPaused = _model.isPaused(); _isPlaying = _model.isPlaying(); });

  function _initializeSolvers() {
    for (var i=0,n=_privateOdesList.length; i<n; i++) _privateOdesList[i].initializeSolver();
  }

  function _automaticResetSolvers() {
    for (var i=0,n=_privateOdesList.length; i<n; i++) _privateOdesList[i].automaticResetSolver();
  }

  _model.resetSolvers = function() {
    for (var i=0,n=_privateOdesList.length; i<n; i++) _privateOdesList[i].resetSolver();
  };

  _getODE = function (_odeName) {
    if (_odeName=="Evol Page") return _ODEi_evolution1;
    return null;
  }

  function _getEventSolver(_odeName) {
    var ode = _getODE(_odeName);
    if (ode===null) return null;
    return ode.getEventSolver();
  }

  function _setSolverClass(_odeName, _engine) {
    var ode = _getODE(_odeName);
    if (ode===null) return;
    if (!_engine.setODE) {
      var classname = _engine.toLowerCase();
      if      (classname.indexOf("boga")>=0)   _engine = EJSS_ODE_SOLVERS.bogackiShampine23;
      else if (classname.indexOf("cash")>=0)   _engine = EJSS_ODE_SOLVERS.cashKarp45;
      else if (classname.indexOf("dopri5")>=0) _engine = EJSS_ODE_SOLVERS.dopri5;
      else if (classname.indexOf("dopri8")>=0) _engine = EJSS_ODE_SOLVERS.dopri853;
      else if (classname.indexOf("richa")>=0)  _engine = EJSS_ODE_SOLVERS.eulerRichardson;
      else if (classname.indexOf("euler")>=0)  _engine = EJSS_ODE_SOLVERS.euler;
      else if (classname.indexOf("fehlberg87")>=0) _engine = EJSS_ODE_SOLVERS.fehlberg87;
      else if (classname.indexOf("fehlberg8")>=0)  _engine = EJSS_ODE_SOLVERS.fehlberg8;
      else if (classname.indexOf("radau")>=0)   _engine = EJSS_ODE_SOLVERS.radau5;
      else if (classname.indexOf("runge")>=0)  _engine = EJSS_ODE_SOLVERS.rungeKutta4;
      else if (classname.indexOf("rk4")>=0)    _engine = EJSS_ODE_SOLVERS.rungeKutta4;
      else if (classname.indexOf("verlet")>=0) _engine = EJSS_ODE_SOLVERS.velocityVerlet;
    }
    if (_engine) ode.setSolverClass(_engine);
  }

  function _ODE_evolution1() {
    var __odeSelf = {};
    var __eventSolver;
    var __solverClass = EJSS_ODE_SOLVERS.rungeKutta4;
    var __state=[];
    var _ODE_evolution1_Event1;
    var _ODE_evolution1_Event2;
    var __ignoreErrors=false;
    var __mustInitialize=true;
    var __isEnabled=true;
    var __mustUserReinitialize=false;
    var __mustReinitialize=true;


    __odeSelf._getOdeVars = function (){ return["x","xdrag","t"]};

    __odeSelf.setSolverClass = function(__aSolverClass) {
      __solverClass = __aSolverClass;
      __instantiateSolver();
    };

    function __instantiateSolver() {
      __state=[];
      __pushState();
      __eventSolver = EJSS_ODE_SOLVERS.interpolatorEventSolver(__solverClass(),__odeSelf);
      __mustInitialize = true;
    }

    __odeSelf.setEnabled = function(_enabled) { __isEnabled = _enabled; };

    __odeSelf.getIndependentVariableValue = function() { return __eventSolver.getIndependentVariableValue(); };

    __odeSelf.getInternalStepSize = function() { return __eventSolver.getInternalStepSize(); };

    __odeSelf.isAccelerationIndependentOfVelocity = function() { return false; };

    __odeSelf.initializeSolver = function() {
      if (__arraysChanged()) { __instantiateSolver(); __odeSelf.initializeSolver(); return; }
      __pushState();
      __eventSolver.initialize(dt);
      __eventSolver.setBestInterpolation(false);
      __eventSolver.setMaximumInternalSteps(10000);
      __eventSolver.removeAllEvents();
      if (__pagesEnabled["Event"]) __eventSolver.addEvent(_ODE_evolution1_Event1());
      if (__pagesEnabled["Event 2"]) __eventSolver.addEvent(_ODE_evolution1_Event2());
      for(k in userEvents1){__eventSolver.addEvent(userEvents1[k]);}
      __eventSolver.setEstimateFirstStep(false);
      __eventSolver.setEnableExceptions(false);
      __eventSolver.setTolerances(0.00001,0.00001);
      __mustReinitialize = true;
      __mustInitialize = false;
    };

    function __pushState() {
      // Copy our variables to __state[] 
        var __j=0;
        var __n=0;
        var __cIn=0;
        if (__state[__cIn]!=x) __mustReinitialize = true;
        __state[__cIn++] = x;
        if (__state[__cIn]!=xdrag) __mustReinitialize = true;
        __state[__cIn++] = xdrag;
        if (__state[__cIn]!=t) __mustReinitialize = true;
        __state[__cIn++] = t;
    }

    function __arraysChanged () {
      return false;
    }

    __odeSelf.getEventSolver = function() {
      return __eventSolver;
    };

    __odeSelf.resetSolver = function() {
      __mustUserReinitialize = true;
    };

    __odeSelf.automaticResetSolver = function() {
      __mustReinitialize = true;
    };

    function __errorAction () {
      if (__ignoreErrors) return;
      console.log (__eventSolver.getErrorMessage());
      _pause();
      // Make sure the solver is reinitialized;
      __mustReinitialize = true;
    }

    __odeSelf.step = function() { return __privateStep(false); };

    __odeSelf.solverStep = function() { return __privateStep(true); };

    function __privateStep(__takeMaximumStep) {
      if (!__isEnabled) return 0;
      if (dt===0) return 0;
      if (__mustInitialize) __odeSelf.initializeSolver();
      if (__arraysChanged()) { __instantiateSolver(); __odeSelf.initializeSolver(); }
      __eventSolver.setStepSize(dt);
      __eventSolver.setInternalStepSize(dt);
      __eventSolver.setMaximumInternalSteps(10000);
      __eventSolver.setTolerances(0.00001,0.00001);
      __pushState();
      if (__mustUserReinitialize) { 
        __eventSolver.userReinitialize();
        __mustUserReinitialize = false;
        __mustReinitialize = false;
        if (__eventSolver.getErrorCode()!=EJSS_ODE_SOLVERS.ERROR.NO_ERROR) __errorAction();
      }
      else if (__mustReinitialize) { 
        __eventSolver.reinitialize();
        __mustReinitialize = false;
        if (__eventSolver.getErrorCode()!=EJSS_ODE_SOLVERS.ERROR.NO_ERROR) __errorAction();
      }
      var __stepTaken = __takeMaximumStep ? __eventSolver.maxStep() : __eventSolver.step();
      // Extract our variables from __state
        var __i=0;
        var __cOut=0;
        x = __state[__cOut++];
        xdrag = __state[__cOut++];
        t = __state[__cOut++];
      // Check for error
      if (__eventSolver.getErrorCode()!=EJSS_ODE_SOLVERS.ERROR.NO_ERROR) __errorAction();
      return __stepTaken;
    }

    __odeSelf.getState = function() { return __state; };

    __odeSelf.getRate = function(_aState,_aRate) {
      // Extract our variables from _aState
        var __i=0;
        var __cOut=0;
        var x = _aState[__cOut++];
        var xdrag = _aState[__cOut++];
        var t = _aState[__cOut++];
      // Compute the rate
        var __cRate=0;
        _aRate[__cRate++] = vx; // Rate for ODE: Evol Page:x
        _aRate[__cRate++] = vx; // Rate for ODE: Evol Page:xdrag
        _aRate[__cRate++] = 1; // independent variable
        return _aRate;
    }; //end of getRate

    __odeSelf._addEvent = function(userCondition,userAction,eventType,eventMethod,maxIter,eventTolerance,endAtEvent){
    var User_Event = function (userCondition,userAction,eventType,eventMethod,maxIter,eventTolerance,endAtEvent) {
      var _eventSelf = {};

      _eventSelf.getTypeOfEvent = function() { return eventType; };

      _eventSelf.getRootFindingMethod = function() { return eventMethod; };

      _eventSelf.getMaxIterations = function() { return maxIter; };

      _eventSelf.getTolerance = function() { return eventTolerance; };

      _eventSelf.evaluate = function(_aState) { 
      // Extract our variables from _aState
        var __i=0;
        var __cOut=0;
        var x = _aState[__cOut++];
        var xdrag = _aState[__cOut++];
        var t = _aState[__cOut++];
      return eval(userCondition);
      };

      _eventSelf.action = function() { 
      // Extract our variables from __state
        var __i=0;
        var __cOut=0;
        x = __state[__cOut++];
        xdrag = __state[__cOut++];
        t = __state[__cOut++];
        var _returnValue = __userDefinedAction();
      // Copy our variables to __state[] 
        var __j=0;
        var __n=0;
        var __cIn=0;
        __state[__cIn++] = x;
        __state[__cIn++] = xdrag;
        __state[__cIn++] = t;
        return _returnValue;
      };

      function __userDefinedAction() {
        if (undefined != functions) eval(functions.toString());
        eval(userAction);
        return endAtEvent;
      }

      return _eventSelf;
    }; // End of event

   userEvents1.push(User_Event(userCondition,userAction,eventType,eventMethod,maxIter,eventTolerance,endAtEvent));
   }

    _ODE_evolution1_Event1 = function() {
      var _eventSelf = {};

      _eventSelf.getTypeOfEvent = function() { return EJSS_ODE_SOLVERS.EVENT_TYPE.CROSSING_EVENT; };

      _eventSelf.getRootFindingMethod = function() { return EJSS_ODE_SOLVERS.EVENT_METHOD.BISECTION; };

      _eventSelf.getMaxIterations = function() { return 100; };

      _eventSelf.getTolerance = function() { return 1.0e-5; };

      _eventSelf.evaluate = function(_aState) { 
      // Extract our variables from _aState
        var __i=0;
        var __cOut=0;
        var x = _aState[__cOut++];
        var xdrag = _aState[__cOut++];
        var t = _aState[__cOut++];
        return x-xmax;  // > Event zero-condition for page Evol Page:1
      };

      _eventSelf.action = function() { 
      // Extract our variables from __state
        var __i=0;
        var __cOut=0;
        x = __state[__cOut++];
        xdrag = __state[__cOut++];
        t = __state[__cOut++];
        var _returnValue = __userDefinedAction();
      // Copy our variables to __state[] 
        var __j=0;
        var __n=0;
        var __cIn=0;
        __state[__cIn++] = x;
        __state[__cIn++] = xdrag;
        __state[__cIn++] = t;
        return _returnValue;
      };

      function __userDefinedAction() {
        vx = -1;  // > Event action for page Evol Page:1
        return true;
      }

      return _eventSelf;
    }; // End of event

    _ODE_evolution1_Event2 = function() {
      var _eventSelf = {};

      _eventSelf.getTypeOfEvent = function() { return EJSS_ODE_SOLVERS.EVENT_TYPE.CROSSING_EVENT; };

      _eventSelf.getRootFindingMethod = function() { return EJSS_ODE_SOLVERS.EVENT_METHOD.BISECTION; };

      _eventSelf.getMaxIterations = function() { return 100; };

      _eventSelf.getTolerance = function() { return 1.0e-5; };

      _eventSelf.evaluate = function(_aState) { 
      // Extract our variables from _aState
        var __i=0;
        var __cOut=0;
        var x = _aState[__cOut++];
        var xdrag = _aState[__cOut++];
        var t = _aState[__cOut++];
        return  (ox+w/2)-x;// ox=x2+x-w/2  // > Event zero-condition for page Evol Page:1
      };

      _eventSelf.action = function() { 
      // Extract our variables from __state
        var __i=0;
        var __cOut=0;
        x = __state[__cOut++];
        xdrag = __state[__cOut++];
        t = __state[__cOut++];
        var _returnValue = __userDefinedAction();
      // Copy our variables to __state[] 
        var __j=0;
        var __n=0;
        var __cIn=0;
        __state[__cIn++] = x;
        __state[__cIn++] = xdrag;
        __state[__cIn++] = t;
        return _returnValue;
      };

      function __userDefinedAction() {
        vx =1;  // > Event action for page Evol Page:1
        _pause();  // > Event action for page Evol Page:2
        text = "paused";  // > Event action for page Evol Page:3
        return true;
      }

      return _eventSelf;
    }; // End of event

    __instantiateSolver();

    return __odeSelf;
  }

  function _historic_x(__time) {
    var __index = 0;
    return _ODEi_evolution1.getEventSolver().getStateHistory().interpolate(__time,__index);
  }

  function _historic_xdrag(__time) {
    var __index = 0 + 1;
    return _ODEi_evolution1.getEventSolver().getStateHistory().interpolate(__time,__index);
  }

    _model._fontResized = function(iBase,iSize,iDelta) {
      _view._fontResized(iBase,iSize,iDelta);
  }; // end of _fontResized

  function _getViews() {
    var _viewsInfo = [];
    var _counter = 0;
    _viewsInfo[_counter++] = { name : "HtmlView Page", width : null, height : null };
    return _viewsInfo;
  } // end of _getViews

  function _selectView(_viewNumber) {
    _view = null;
    _view = new AAPTVernierCaliper_View(_topFrame,_viewNumber,_libraryPath,_codebasePath);
    var _view_super_reset = _view._reset;
    _view._reset = function() {
      _view_super_reset();
      switch(_viewNumber) {
        case -10 : break; // make Lint happy
        default :
        case 0:
          _view.plottingPanel.linkProperty("Height",  function() { return changeOrientation(); }, function(_v) { changeOrientation() = _v; } ); // HtmlView Page linking property 'Height' for element 'plottingPanel'
          _view.plottingPanel.linkProperty("Width",  function() { return Width1; }, function(_v) { Width1 = _v; } ); // HtmlView Page linking property 'Width' for element 'plottingPanel'
          _view.plottingPanel.setAction("OnDoubleClick", function(_data,_info) {
  _pause();
  toggleFullScreen();

}); // HtmlView Page setting action 'OnDoubleClick' for element 'plottingPanel'
          _view.plottingPanel.linkProperty("TRMessage",  function() { return K1fcorrect; }, function(_v) { K1fcorrect = _v; } ); // HtmlView Page linking property 'TRMessage' for element 'plottingPanel'
          _view.plottingPanel.setAction("OnPress", function(_data,_info) {
  showBannerAd();

}); // HtmlView Page setting action 'OnPress' for element 'plottingPanel'
          _view.plottingPanel.linkProperty("TLMessage",  function() { return _isMobile?"":""; } ); // HtmlView Page linking property 'TLMessage' for element 'plottingPanel'
          _view.plottingPanel.setAction("OnDrag", function(_data,_info) {
  _view.plottingPanel.setProperty("MinimumX",Math.max(_view.plottingPanel.getProperty("MinimumX"),-200));
  _view.plottingPanel.setProperty("MaximumX",Math.min(_view.plottingPanel.getProperty("MaximumX"),250));
  _view.plottingPanel.setProperty("MinimumY",Math.max(_view.plottingPanel.getProperty("MinimumY"),-100));
  _view.plottingPanel.setProperty("MaximumY",Math.min(_view.plottingPanel.getProperty("MaximumY"),100));
  _view.plottingPanel.setZoomLimits([100,450]);

}); // HtmlView Page setting action 'OnDrag' for element 'plottingPanel'
          _view.plottingPanel.setAction("OnZoom", function(_data,_info) {
  _view.plottingPanel.setZoomLimits([100,450]);

}); // HtmlView Page setting action 'OnZoom' for element 'plottingPanel'
          _view.plottingPanel.linkProperty("BRMessage",  function() { return l_x; }, function(_v) { l_x = _v; } ); // HtmlView Page linking property 'BRMessage' for element 'plottingPanel'
          _view.circlepush.linkProperty("SizeX",  function() { return size*1.5; } ); // HtmlView Page linking property 'SizeX' for element 'circlepush'
          _view.circlepush.linkProperty("X",  function() { return x+x2+L-size; } ); // HtmlView Page linking property 'X' for element 'circlepush'
          _view.circlepush.linkProperty("Y",  function() { return zero+y2+y3/1.7; } ); // HtmlView Page linking property 'Y' for element 'circlepush'
          _view.circlepush.linkProperty("SizeY",  function() { return size*1.5; } ); // HtmlView Page linking property 'SizeY' for element 'circlepush'
          _view.topnutscrewSVG.linkProperty("SizeX",  function() { return size/2; } ); // HtmlView Page linking property 'SizeX' for element 'topnutscrewSVG'
          _view.topnutscrewSVG.linkProperty("X",  function() { return x+x2+size*5; } ); // HtmlView Page linking property 'X' for element 'topnutscrewSVG'
          _view.topnutscrewSVG.linkProperty("Y",  function() { return zero+y1; } ); // HtmlView Page linking property 'Y' for element 'topnutscrewSVG'
          _view.topnutscrewSVG.linkProperty("SizeY",  function() { return size/2; } ); // HtmlView Page linking property 'SizeY' for element 'topnutscrewSVG'
          _view.topnutSVG.linkProperty("SizeX",  function() { return size; }, function(_v) { size = _v; } ); // HtmlView Page linking property 'SizeX' for element 'topnutSVG'
          _view.topnutSVG.linkProperty("X",  function() { return x+x2+size*5; } ); // HtmlView Page linking property 'X' for element 'topnutSVG'
          _view.topnutSVG.linkProperty("Y",  function() { return zero+y1+size/2; } ); // HtmlView Page linking property 'Y' for element 'topnutSVG'
          _view.topnutSVG.linkProperty("SizeY",  function() { return size/2; } ); // HtmlView Page linking property 'SizeY' for element 'topnutSVG'
          _view.tail2.linkProperty("Points",  function() { return xytail; }, function(_v) { xytail = _v; } ); // HtmlView Page linking property 'Points' for element 'tail2'
          _view.tail2.linkProperty("X",  function() { return x; }, function(_v) { x = _v; } ); // HtmlView Page linking property 'X' for element 'tail2'
          _view.tail2.linkProperty("Y",  function() { return y1/2; } ); // HtmlView Page linking property 'Y' for element 'tail2'
          _view.tail.linkProperty("Points",  function() { return xytail; }, function(_v) { xytail = _v; } ); // HtmlView Page linking property 'Points' for element 'tail'
          _view.tail.linkProperty("X",  function() { return x; }, function(_v) { x = _v; } ); // HtmlView Page linking property 'X' for element 'tail'
          _view.tail.linkProperty("Y",  function() { return y1/2; } ); // HtmlView Page linking property 'Y' for element 'tail'
          _view.top2.linkProperty("Points",  function() { return xy7; }, function(_v) { xy7 = _v; } ); // HtmlView Page linking property 'Points' for element 'top2'
          _view.xy71.linkProperty("Y",  function() { return -y1; } ); // HtmlView Page linking property 'Y' for element 'xy71'
          _view.bottomcasing.linkProperty("Y",  function() { return -y1; } ); // HtmlView Page linking property 'Y' for element 'bottomcasing'
          _view.topcasing.linkProperty("SizeY",  function() { return 5*1.41; } ); // HtmlView Page linking property 'SizeY' for element 'topcasing'
          _view.xy7smalltipsshapeSVG4.linkProperty("Y",  function() { return -y1; } ); // HtmlView Page linking property 'Y' for element 'xy7smalltipsshapeSVG4'
          _view.dragme2.linkProperty("X",  function() { return xm[1]; } ); // HtmlView Page linking property 'X' for element 'dragme2'
          _view.dragme2.linkProperty("Y",  function() { return dym[0]; } ); // HtmlView Page linking property 'Y' for element 'dragme2'
          _view.segmentSet.linkProperty("NumberOfElements",  function() { return nm; }, function(_v) { nm = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'segmentSet'
          _view.segmentSet.linkProperty("SizeX",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'SizeX' for element 'segmentSet'
          _view.segmentSet.linkProperty("X",  function() { return xm; }, function(_v) { xm = _v; } ); // HtmlView Page linking property 'X' for element 'segmentSet'
          _view.segmentSet.linkProperty("Y",  function() { return y2; }, function(_v) { y2 = _v; } ); // HtmlView Page linking property 'Y' for element 'segmentSet'
          _view.segmentSet.linkProperty("SizeY",  function() { return dym; }, function(_v) { dym = _v; } ); // HtmlView Page linking property 'SizeY' for element 'segmentSet'
          _view.cmshow.linkProperty("X",  function() { return xm[nm-8]; } ); // HtmlView Page linking property 'X' for element 'cmshow'
          _view.cmshow.linkProperty("Y",  function() { return dym[0]; } ); // HtmlView Page linking property 'Y' for element 'cmshow'
          _view.cmshow.linkProperty("Visibility",  function() { return cmshow; }, function(_v) { cmshow = _v; } ); // HtmlView Page linking property 'Visibility' for element 'cmshow'
          _view.cmshow.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'cmshow'
          _view.unitLabel.linkProperty("X",  function() { return xm[nm-8]; } ); // HtmlView Page linking property 'X' for element 'unitLabel'
          _view.unitLabel.linkProperty("Y",  function() { return dym[0]; } ); // HtmlView Page linking property 'Y' for element 'unitLabel'
          _view.unitLabel.linkProperty("Visibility",  function() { return !cmshow; } ); // HtmlView Page linking property 'Visibility' for element 'unitLabel'
          _view.textSetnumberonmainscale.linkProperty("NumberOfElements",  function() { return nmt; }, function(_v) { nmt = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'textSetnumberonmainscale'
          _view.textSetnumberonmainscale.linkProperty("SizeX",  function() { return size; }, function(_v) { size = _v; } ); // HtmlView Page linking property 'SizeX' for element 'textSetnumberonmainscale'
          _view.textSetnumberonmainscale.linkProperty("X",  function() { return xmt; }, function(_v) { xmt = _v; } ); // HtmlView Page linking property 'X' for element 'textSetnumberonmainscale'
          _view.textSetnumberonmainscale.linkProperty("Y",  function() { return y1/2+size/4; } ); // HtmlView Page linking property 'Y' for element 'textSetnumberonmainscale'
          _view.textSetnumberonmainscale.linkProperty("Text",  function() { return tmt; }, function(_v) { tmt = _v; } ); // HtmlView Page linking property 'Text' for element 'textSetnumberonmainscale'
          _view.textSetnumberonmainscale.linkProperty("SizeY",  function() { return size; }, function(_v) { size = _v; } ); // HtmlView Page linking property 'SizeY' for element 'textSetnumberonmainscale'
          _view.textSetnumberonmainscale.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'textSetnumberonmainscale'
          _view.polygon.linkProperty("Points",  function() { return xy6; }, function(_v) { xy6 = _v; } ); // HtmlView Page linking property 'Points' for element 'polygon'
          _view.polygon.linkProperty("X",  function() { return x; }, function(_v) { x = _v; } ); // HtmlView Page linking property 'X' for element 'polygon'
          _view.polygon.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'polygon'
          _view.polygon.setAction("OnPress", function(_data,_info) {
  if (x >= xmax-x2-1) x= xmax-x2-1;
  y = 0;

}); // HtmlView Page setting action 'OnPress' for element 'polygon'
          _view.polygon.setAction("OnDrag", function(_data,_info) {
  if (x >= xmax-x2-1) x= xmax-x2-1;
  y = 0;

}); // HtmlView Page setting action 'OnDrag' for element 'polygon'
          _view.bottomdrawingSVG2.setAction("OnDrag", function(_data,_info) {
  dragemetrue2=true;
  x = 160+xdrag;
  //xdrag = -160+x;
  if (xdrag >=  -160+xmax-x2-1) xdrag=  -160+xmax-x2-1;
  if ((xdrag <=  -160)&&(oy<-70)) xdrag=  -160; //object not inside jaws
  if ((xdrag <=  -160+w)&&(oy>-70)) {
    xdrag=  -160+w; //object inside jaws
  //alert();
  }//if (x >= xmax-x2-1) x= xmax-x2-1;
  y = 0;

}); // HtmlView Page setting action 'OnDrag' for element 'bottomdrawingSVG2'
          _view.bottomdrawingSVG2.linkProperty("X",  function() { return xdrag; }, function(_v) { xdrag = _v; } ); // HtmlView Page linking property 'X' for element 'bottomdrawingSVG2'
          _view.bottomdrawingSVG2.setAction("OnPress", function(_data,_info) {
  x = 160+xdrag;
  //xdrag = -160+x;
  if (xdrag >=  -160+xmax-x2-1) xdrag=  -160+xmax-x2-1;
  if (xdrag <=  -160) xdrag=  -160;
  //if (x >= xmax-x2-1) x= xmax-x2-1;
  y = 0;

}); // HtmlView Page setting action 'OnPress' for element 'bottomdrawingSVG2'
          _view.bottomdrawingSVG.setAction("OnDrag", function(_data,_info) {
  dragemetrue2=true;
  x = 160+xdrag;
  //xdrag = -160+x;
  if (xdrag >=  -160+xmax-x2-50) { //-50 is offset to keep drawing nice
    xdrag=  -160+xmax-x2-50;
    //alert("1");
    }
  if ((xdrag <=  -160)&&(oy<-70)) xdrag=  -160; //object not inside jaws
  if ((xdrag <=  -160+w)&&(oy>-70)) {
    xdrag=  -160+w; //object inside jaws
  //alert();
  }//if (x >= xmax-x2-1) x= xmax-x2-1;
  y = 0;

}); // HtmlView Page setting action 'OnDrag' for element 'bottomdrawingSVG'
          _view.bottomdrawingSVG.linkProperty("X",  function() { return xdrag; }, function(_v) { xdrag = _v; } ); // HtmlView Page linking property 'X' for element 'bottomdrawingSVG'
          _view.bottomdrawingSVG.setAction("OnPress", function(_data,_info) {
  x = 160+xdrag;
  //xdrag = -160+x;
  if (xdrag >=  -160+xmax-x2-1) xdrag=  -160+xmax-x2-1;
  if (xdrag <=  -160) xdrag=  -160;
  //if (x >= xmax-x2-1) x= xmax-x2-1;
  y = 0;

}); // HtmlView Page setting action 'OnPress' for element 'bottomdrawingSVG'
          _view.screwSVG3.linkProperty("X",  function() { return x-50; } ); // HtmlView Page linking property 'X' for element 'screwSVG3'
          _view.xy7smalltipsshape2SVG4.linkProperty("X",  function() { return -160+x; } ); // HtmlView Page linking property 'X' for element 'xy7smalltipsshape2SVG4'
          _view.xy7smalltipsshape2SVG4.linkProperty("Y",  function() { return -y1; } ); // HtmlView Page linking property 'Y' for element 'xy7smalltipsshape2SVG4'
          _view.dragme.linkProperty("X",  function() { return x; }, function(_v) { x = _v; } ); // HtmlView Page linking property 'X' for element 'dragme'
          _view.dragme.linkProperty("Y",  function() { return -size*3; } ); // HtmlView Page linking property 'Y' for element 'dragme'
          _view.dragme.setAction("OnPress", function(_data,_info) {
  showmagnify=false;

}); // HtmlView Page setting action 'OnPress' for element 'dragme'
          _view.dragme.setAction("OnDrag", function(_data,_info) {
  dragemetrue2=true;
  if (x >= xmax-x2-1) x= xmax-x2-1;
  //if ( x>=xmax/16) xmagnify=x;
  y = 0;

}); // HtmlView Page setting action 'OnDrag' for element 'dragme'
          _view.dragme32.linkProperty("X",  function() { return dragmex; }, function(_v) { dragmex = _v; } ); // HtmlView Page linking property 'X' for element 'dragme32'
          _view.dragme32.linkProperty("Y",  function() { return dragmey; }, function(_v) { dragmey = _v; } ); // HtmlView Page linking property 'Y' for element 'dragme32'
          _view.dragme32.linkProperty("Visibility",  function() { return (dragemetrue2===false); } ); // HtmlView Page linking property 'Visibility' for element 'dragme32'
          _view.arrowdragme2.linkProperty("SizeX",  function() { return x-dragmex; } ); // HtmlView Page linking property 'SizeX' for element 'arrowdragme2'
          _view.arrowdragme2.linkProperty("X",  function() { return dragmex; }, function(_v) { dragmex = _v; } ); // HtmlView Page linking property 'X' for element 'arrowdragme2'
          _view.arrowdragme2.linkProperty("Y",  function() { return dragmey; }, function(_v) { dragmey = _v; } ); // HtmlView Page linking property 'Y' for element 'arrowdragme2'
          _view.arrowdragme2.linkProperty("Visibility",  function() { return dragemetrue2===false; } ); // HtmlView Page linking property 'Visibility' for element 'arrowdragme2'
          _view.arrowdragme2.linkProperty("SizeY",  function() { return -size*3-dragmey; } ); // HtmlView Page linking property 'SizeY' for element 'arrowdragme2'
          _view.segmentSet2.linkProperty("NumberOfElements",  function() { return n2s; }, function(_v) { n2s = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'segmentSet2'
          _view.segmentSet2.linkProperty("SizeX",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'SizeX' for element 'segmentSet2'
          _view.segmentSet2.linkProperty("X",  function() { return xm2; }, function(_v) { xm2 = _v; } ); // HtmlView Page linking property 'X' for element 'segmentSet2'
          _view.segmentSet2.linkProperty("Y",  function() { return y2; }, function(_v) { y2 = _v; } ); // HtmlView Page linking property 'Y' for element 'segmentSet2'
          _view.segmentSet2.linkProperty("SizeY",  function() { return dy2; }, function(_v) { dy2 = _v; } ); // HtmlView Page linking property 'SizeY' for element 'segmentSet2'
          _view.textSet2.linkProperty("NumberOfElements",  function() { return n2t; }, function(_v) { n2t = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'textSet2'
          _view.textSet2.linkProperty("SizeX",  function() { return size*2; } ); // HtmlView Page linking property 'SizeX' for element 'textSet2'
          _view.textSet2.linkProperty("X",  function() { return xm2t; }, function(_v) { xm2t = _v; } ); // HtmlView Page linking property 'X' for element 'textSet2'
          _view.textSet2.linkProperty("Y",  function() { return -y1/4-size/4; } ); // HtmlView Page linking property 'Y' for element 'textSet2'
          _view.textSet2.linkProperty("Text",  function() { return tm2t; }, function(_v) { tm2t = _v; } ); // HtmlView Page linking property 'Text' for element 'textSet2'
          _view.textSet2.linkProperty("SizeY",  function() { return size*2; } ); // HtmlView Page linking property 'SizeY' for element 'textSet2'
          _view.xreplacedrag.linkProperty("X",  function() { return xreplacedrag; }, function(_v) { xreplacedrag = _v; } ); // HtmlView Page linking property 'X' for element 'xreplacedrag'
          _view.xreplacedrag.linkProperty("Y",  function() { return -size*3; } ); // HtmlView Page linking property 'Y' for element 'xreplacedrag'
          _view.xreplacedrag.setAction("OnDrag", function(_data,_info) {
  x = xreplacedrag;

}); // HtmlView Page setting action 'OnDrag' for element 'xreplacedrag'
          _view.jawtopmove.linkProperty("Points",  function() { return xy5; }, function(_v) { xy5 = _v; } ); // HtmlView Page linking property 'Points' for element 'jawtopmove'
          _view.jawtopmove.linkProperty("X",  function() { return x; }, function(_v) { x = _v; } ); // HtmlView Page linking property 'X' for element 'jawtopmove'
          _view.jawtopmove.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'jawtopmove'
          _view.xy7top22SVG2.linkProperty("X",  function() { return -160+x; } ); // HtmlView Page linking property 'X' for element 'xy7top22SVG2'
          _view.xy7top22SVG.linkProperty("X",  function() { return -160+x; } ); // HtmlView Page linking property 'X' for element 'xy7top22SVG'
          _view.xy7topsmallpiece2.linkProperty("X",  function() { return -160+x; } ); // HtmlView Page linking property 'X' for element 'xy7topsmallpiece2'
          _view.text14cm.linkProperty("SizeX",  function() { return size*2; } ); // HtmlView Page linking property 'SizeX' for element 'text14cm'
          _view.text14cm.linkProperty("X",  function() { return xpt; }, function(_v) { xpt = _v; } ); // HtmlView Page linking property 'X' for element 'text14cm'
          _view.text14cm.linkProperty("Y",  function() { return y2+6*size; } ); // HtmlView Page linking property 'Y' for element 'text14cm'
          _view.text14cm.linkProperty("Text",  function() { return _view._format(Math.floor(answer+error*unit)/10,"0.0"); } ); // HtmlView Page linking property 'Text' for element 'text14cm'
          _view.text14cm.linkProperty("Visibility",  function() { return showhint&&cmshow; } ); // HtmlView Page linking property 'Visibility' for element 'text14cm'
          _view.text14cm.linkProperty("SizeY",  function() { return size*2; } ); // HtmlView Page linking property 'SizeY' for element 'text14cm'
          _view.text14mm.linkProperty("SizeX",  function() { return size*2; } ); // HtmlView Page linking property 'SizeX' for element 'text14mm'
          _view.text14mm.linkProperty("X",  function() { return xpt; }, function(_v) { xpt = _v; } ); // HtmlView Page linking property 'X' for element 'text14mm'
          _view.text14mm.linkProperty("Y",  function() { return y2+6*size; } ); // HtmlView Page linking property 'Y' for element 'text14mm'
          _view.text14mm.linkProperty("Text",  function() { return _view._format(Math.floor(answer+error*unit),"0"); } ); // HtmlView Page linking property 'Text' for element 'text14mm'
          _view.text14mm.linkProperty("Visibility",  function() { return showhint&&!cmshow; } ); // HtmlView Page linking property 'Visibility' for element 'text14mm'
          _view.text14mm.linkProperty("SizeY",  function() { return size*2; } ); // HtmlView Page linking property 'SizeY' for element 'text14mm'
          _view.arrow2.linkProperty("SizeX",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'SizeX' for element 'arrow2'
          _view.arrow2.linkProperty("X",  function() { return xpt; }, function(_v) { xpt = _v; } ); // HtmlView Page linking property 'X' for element 'arrow2'
          _view.arrow2.linkProperty("Y",  function() { return y2+5*size; } ); // HtmlView Page linking property 'Y' for element 'arrow2'
          _view.arrow2.linkProperty("Visibility",  function() { return showhint; }, function(_v) { showhint = _v; } ); // HtmlView Page linking property 'Visibility' for element 'arrow2'
          _view.arrow2.linkProperty("SizeY",  function() { return -5*size; } ); // HtmlView Page linking property 'SizeY' for element 'arrow2'
          _view.arrow.linkProperty("SizeX",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'SizeX' for element 'arrow'
          _view.arrow.linkProperty("X",  function() { return xp; }, function(_v) { xp = _v; } ); // HtmlView Page linking property 'X' for element 'arrow'
          _view.arrow.linkProperty("Y",  function() { return y2-size; } ); // HtmlView Page linking property 'Y' for element 'arrow'
          _view.arrow.linkProperty("Visibility",  function() { return showhint; }, function(_v) { showhint = _v; } ); // HtmlView Page linking property 'Visibility' for element 'arrow'
          _view.arrow.linkProperty("SizeY",  function() { return size*6; } ); // HtmlView Page linking property 'SizeY' for element 'arrow'
          _view.textmm.linkProperty("SizeX",  function() { return size*5; } ); // HtmlView Page linking property 'SizeX' for element 'textmm'
          _view.textmm.linkProperty("X",  function() { return xp; }, function(_v) { xp = _v; } ); // HtmlView Page linking property 'X' for element 'textmm'
          _view.textmm.linkProperty("Y",  function() { return y2-5*size; } ); // HtmlView Page linking property 'Y' for element 'textmm'
          _view.textmm.linkProperty("Text",  function() { return text2; }, function(_v) { text2 = _v; } ); // HtmlView Page linking property 'Text' for element 'textmm'
          _view.textmm.linkProperty("Visibility",  function() { return showhint&&!cmshow; } ); // HtmlView Page linking property 'Visibility' for element 'textmm'
          _view.textmm.linkProperty("SizeY",  function() { return size*2; } ); // HtmlView Page linking property 'SizeY' for element 'textmm'
          _view.text2cm.linkProperty("SizeX",  function() { return size*5; } ); // HtmlView Page linking property 'SizeX' for element 'text2cm'
          _view.text2cm.linkProperty("X",  function() { return xp; }, function(_v) { xp = _v; } ); // HtmlView Page linking property 'X' for element 'text2cm'
          _view.text2cm.linkProperty("Y",  function() { return y2-5*size; } ); // HtmlView Page linking property 'Y' for element 'text2cm'
          _view.text2cm.linkProperty("Text",  function() { return text2cm; }, function(_v) { text2cm = _v; } ); // HtmlView Page linking property 'Text' for element 'text2cm'
          _view.text2cm.linkProperty("Visibility",  function() { return showhint&&cmshow; } ); // HtmlView Page linking property 'Visibility' for element 'text2cm'
          _view.text2cm.linkProperty("SizeY",  function() { return size*2; } ); // HtmlView Page linking property 'SizeY' for element 'text2cm'
          _view.bottomDragme.linkProperty("SizeX",  function() { return bottomdragmesize; }, function(_v) { bottomdragmesize = _v; } ); // HtmlView Page linking property 'SizeX' for element 'bottomDragme'
          _view.bottomDragme.linkProperty("X",  function() { return ox; }, function(_v) { ox = _v; } ); // HtmlView Page linking property 'X' for element 'bottomDragme'
          _view.bottomDragme.linkProperty("Y",  function() { return oy; }, function(_v) { oy = _v; } ); // HtmlView Page linking property 'Y' for element 'bottomDragme'
          _view.bottomDragme.linkProperty("Visibility",  function() { return botone; }, function(_v) { botone = _v; } ); // HtmlView Page linking property 'Visibility' for element 'bottomDragme'
          _view.bottomDragme.linkProperty("SizeY",  function() { return bottomdragmesize; }, function(_v) { bottomdragmesize = _v; } ); // HtmlView Page linking property 'SizeY' for element 'bottomDragme'
          _view.bottomDragme.setAction("OnDrag", function(_data,_info) {
  oxmax=oxmin+x;
  xdrag=-160+x; // added code to force alignment between  x and xdrag used in new implementation
  if(w>x){ // if width of blue object larger than jaws gap
    if(oy>oymin-h/2)oy=oymin-h/2; // if blue object try to move in the jaws, block it with oy=oymin-h/2
    outobject=true; // outside object is true 
  }else{// object is smaller than the width
   if(outobject){ // if outisde object is true
     if(ox-w/2>oxmin && ox+w/2<oxmax && oy+h/2>oymin){// move inside
       outobject=false; // blue object is inside jaws
     }else{
       if(ox-w/2<oxmin || ox+w/2>oxmax){ // if blue object is force outwards
         if(oy+h/2>oymin)oy=oymin-h/2; // if also inside jaws, then block with oy=oymin-h/2
       }
     }
   }else{
    if(oy+h/2<oymin)outobject=true;// move outside again
    else{
     if(oy+h/2>oymax)oy=oymax-h/2; // top limit reach, block
     if(ox-w/2<oxmin)ox=oxmin+w/2; // left limit reach,block
     else if(ox+w/2>oxmax)ox=oxmax-w/2; //right limit reach, block
    }
   }  
  }

}); // HtmlView Page setting action 'OnDrag' for element 'bottomDragme'
          _view.bottomObject2.linkProperty("SizeX",  function() { return w; }, function(_v) { w = _v; } ); // HtmlView Page linking property 'SizeX' for element 'bottomObject2'
          _view.bottomObject2.linkProperty("X",  function() { return ox; }, function(_v) { ox = _v; } ); // HtmlView Page linking property 'X' for element 'bottomObject2'
          _view.bottomObject2.setAction("OnEnter", function(_data,_info) {
  bottomresizex= ox+w/2;

}); // HtmlView Page setting action 'OnEnter' for element 'bottomObject2'
          _view.bottomObject2.linkProperty("Y",  function() { return oy; }, function(_v) { oy = _v; } ); // HtmlView Page linking property 'Y' for element 'bottomObject2'
          _view.bottomObject2.linkProperty("Visibility",  function() { return botone&&roundshapetype==false; } ); // HtmlView Page linking property 'Visibility' for element 'bottomObject2'
          _view.bottomObject2.linkProperty("SizeY",  function() { return h; }, function(_v) { h = _v; } ); // HtmlView Page linking property 'SizeY' for element 'bottomObject2'
          _view.bottomObject2.setAction("OnDrag", function(_data,_info) {
  oxmax=oxmin+x;
  if(w>x){ // if width of blue object larger than jaws gap
    if(oy>oymin-h/2)oy=oymin-h/2; // if blue object try to move in the jaws, block it with oy=oymin-h/2
    outobject=true; // outside object is true 
  }else{// object is smaller than the width
   if(outobject){ // if outisde object is true
     if(ox-w/2>oxmin && ox+w/2<oxmax && oy+h/2>oymin){// move inside
       outobject=false; // blue object is inside jaws
     }else{
       if(ox-w/2<oxmin || ox+w/2>oxmax){ // if blue object is force outwards
         if(oy+h/2>oymin)oy=oymin-h/2; // if also inside jaws, then block with oy=oymin-h/2
       }
     }
   }else{
    if(oy+h/2<oymin)outobject=true;// move outside again
    else{
     if(oy+h/2>oymax)oy=oymax-h/2; // top limit reach, block
     if(ox-w/2<oxmin)ox=oxmin+w/2; // left limit reach,block
     else if(ox+w/2>oxmax)ox=oxmax-w/2; //right limit reach, block
    }
   }  
  }

}); // HtmlView Page setting action 'OnDrag' for element 'bottomObject2'
          _view.bottomObject.linkProperty("SizeX",  function() { return w; }, function(_v) { w = _v; } ); // HtmlView Page linking property 'SizeX' for element 'bottomObject'
          _view.bottomObject.linkProperty("X",  function() { return ox; }, function(_v) { ox = _v; } ); // HtmlView Page linking property 'X' for element 'bottomObject'
          _view.bottomObject.setAction("OnEnter", function(_data,_info) {
  bottomresizex= ox+w/2;

}); // HtmlView Page setting action 'OnEnter' for element 'bottomObject'
          _view.bottomObject.linkProperty("Y",  function() { return oy; }, function(_v) { oy = _v; } ); // HtmlView Page linking property 'Y' for element 'bottomObject'
          _view.bottomObject.linkProperty("Visibility",  function() { return botone&&roundshapetype; } ); // HtmlView Page linking property 'Visibility' for element 'bottomObject'
          _view.bottomObject.linkProperty("SizeY",  function() { return h; }, function(_v) { h = _v; } ); // HtmlView Page linking property 'SizeY' for element 'bottomObject'
          _view.bottomObject.setAction("OnDrag", function(_data,_info) {
  oxmax=oxmin+x;
  if(w>x){ // if width of blue object larger than jaws gap
    if(oy>oymin-h/2)oy=oymin-h/2; // if blue object try to move in the jaws, block it with oy=oymin-h/2
    outobject=true; // outside object is true 
  }else{// object is smaller than the width
   if(outobject){ // if outisde object is true
     if(ox-w/2>oxmin && ox+w/2<oxmax && oy+h/2>oymin){// move inside
       outobject=false; // blue object is inside jaws
     }else{
       if(ox-w/2<oxmin || ox+w/2>oxmax){ // if blue object is force outwards
         if(oy+h/2>oymin)oy=oymin-h/2; // if also inside jaws, then block with oy=oymin-h/2
       }
     }
   }else{
    if(oy+h/2<oymin)outobject=true;// move outside again
    else{
     if(oy+h/2>oymax)oy=oymax-h/2; // top limit reach, block
     if(ox-w/2<oxmin)ox=oxmin+w/2; // left limit reach,block
     else if(ox+w/2>oxmax)ox=oxmax-w/2; //right limit reach, block
    }
   }  
  }

}); // HtmlView Page setting action 'OnDrag' for element 'bottomObject'
          _view.bottomresize.linkProperty("SizeX",  function() { return bottomdragmesize; }, function(_v) { bottomdragmesize = _v; } ); // HtmlView Page linking property 'SizeX' for element 'bottomresize'
          _view.bottomresize.linkProperty("X",  function() { return bottomresizex; }, function(_v) { bottomresizex = _v; } ); // HtmlView Page linking property 'X' for element 'bottomresize'
          _view.bottomresize.linkProperty("Y",  function() { return oy+h/2; } ); // HtmlView Page linking property 'Y' for element 'bottomresize'
          _view.bottomresize.linkProperty("Visibility",  function() { return botone; }, function(_v) { botone = _v; } ); // HtmlView Page linking property 'Visibility' for element 'bottomresize'
          _view.bottomresize.linkProperty("SizeY",  function() { return bottomdragmesize; }, function(_v) { bottomdragmesize = _v; } ); // HtmlView Page linking property 'SizeY' for element 'bottomresize'
          _view.bottomresize.setAction("OnDrag", function(_data,_info) {
  /*dragemetrue=true;
  w = (bottomresizex -ox)*2;*/
  dragemetrue=false;  
  xdrag=-160+x; // added code to force alignment between  x and xdrag used in new implementation
  if (roundshapetype==true) h=w; // force height to be same as width;

}); // HtmlView Page setting action 'OnDrag' for element 'bottomresize'
          _view.arrowdragme.linkProperty("SizeX",  function() { return bottomresizex-dragmex; } ); // HtmlView Page linking property 'SizeX' for element 'arrowdragme'
          _view.arrowdragme.linkProperty("X",  function() { return dragmex; }, function(_v) { dragmex = _v; } ); // HtmlView Page linking property 'X' for element 'arrowdragme'
          _view.arrowdragme.linkProperty("Y",  function() { return dragmey; }, function(_v) { dragmey = _v; } ); // HtmlView Page linking property 'Y' for element 'arrowdragme'
          _view.arrowdragme.linkProperty("Visibility",  function() { return dragemetrue===false&&botone; } ); // HtmlView Page linking property 'Visibility' for element 'arrowdragme'
          _view.arrowdragme.linkProperty("SizeY",  function() { return oy+h/2-dragmey; } ); // HtmlView Page linking property 'SizeY' for element 'arrowdragme'
          _view.dragme3.linkProperty("X",  function() { return dragmex; }, function(_v) { dragmex = _v; } ); // HtmlView Page linking property 'X' for element 'dragme3'
          _view.dragme3.linkProperty("Y",  function() { return dragmey; }, function(_v) { dragmey = _v; } ); // HtmlView Page linking property 'Y' for element 'dragme3'
          _view.dragme3.linkProperty("Visibility",  function() { return (dragemetrue===false&&botone); } ); // HtmlView Page linking property 'Visibility' for element 'dragme3'
          _view.topObject.linkProperty("Points",  function() { return pxy; }, function(_v) { pxy = _v; } ); // HtmlView Page linking property 'Points' for element 'topObject'
          _view.topObject.linkProperty("Visibility",  function() { return topone; }, function(_v) { topone = _v; } ); // HtmlView Page linking property 'Visibility' for element 'topObject'
          _view.topresize.linkProperty("SizeX",  function() { return bottomdragmesize; }, function(_v) { bottomdragmesize = _v; } ); // HtmlView Page linking property 'SizeX' for element 'topresize'
          //adjustment for internal measurement
          if (testMode){
              _view.topresize.linkProperty("X",  function() { return <?php echo $sizeI; ?> + 70; }, function(_v) { topresizex = _v; } ); // HtmlView Page linking property 'X' for element 'topresize'
          }else{
              _view.topresize.linkProperty("X",  function() { return topresizex; }, function(_v) { topresizex = _v; } ); // HtmlView Page linking property 'X' for element 'topresize'
          }
          _view.topresize.linkProperty("Y",  function() { return yb; }, function(_v) { yb = _v; } ); // HtmlView Page linking property 'Y' for element 'topresize'
          _view.topresize.linkProperty("Visibility",  function() { return topone; }, function(_v) { topone = _v; } ); // HtmlView Page linking property 'Visibility' for element 'topresize'
          _view.topresize.linkProperty("SizeY",  function() { return bottomdragmesize; }, function(_v) { bottomdragmesize = _v; } ); // HtmlView Page linking property 'SizeY' for element 'topresize'
          _view.topresize.setAction("OnDrag", function(_data,_info) {
  b = topresizex-(x0+2*a); 
   if(b>1.5*xmax){
   b=ymax;
   topresizex = 1.5*xmax+(x0+2*a);
    b = topresizex -(x0+2*a);
    }
  else if(b<=w){
  b=w;
  topresizex = w+(x0+2*a);
  b = topresizex-(x0+2*a);
    }

}); // HtmlView Page setting action 'OnDrag' for element 'topresize'
          _view.tailObject.linkProperty("Points",  function() { return oxytail; }, function(_v) { oxytail = _v; } ); // HtmlView Page linking property 'Points' for element 'tailObject'
          _view.tailObject.linkProperty("Visibility",  function() { return tail; }, function(_v) { tail = _v; } ); // HtmlView Page linking property 'Visibility' for element 'tailObject'
          _view.tailresize.linkProperty("X",  function() { return tailresizex; }, function(_v) { tailresizex = _v; } ); // HtmlView Page linking property 'X' for element 'tailresize'
          _view.tailresize.linkProperty("Y",  function() { return y1/2-h2; } ); // HtmlView Page linking property 'Y' for element 'tailresize'
          _view.tailresize.linkProperty("Visibility",  function() { return tail; }, function(_v) { tail = _v; } ); // HtmlView Page linking property 'Visibility' for element 'tailresize'
          _view.tailresize.setAction("OnDrag", function(_data,_info) {
  if (tailresizex< xmax+size){
    tailresizex = xmax+size;
    }
  else  if (tailresizex> 2*xmax){
    tailresizex = 2*xmax;
    }
    td = tailresizex ;
   oxytail[2][0] = oxytail[3][0] = oxtail[2]=oxtail[3]=td; 
  oxytail[6][0] = oxytail[7][0] = oxtail[6]=oxtail[7]=td+size;

}); // HtmlView Page setting action 'OnDrag' for element 'tailresize'
          _view.answer3.linkProperty("X",  function() { return xmagnify; }, function(_v) { xmagnify = _v; } ); // HtmlView Page linking property 'X' for element 'answer3'
          _view.answer3.linkProperty("Y",  function() { return size*9; } ); // HtmlView Page linking property 'Y' for element 'answer3'
          _view.answer.linkProperty("FillColor",  function() { return K1fcorrectbackground; }, function(_v) { K1fcorrectbackground = _v; } ); // HtmlView Page linking property 'FillColor' for element 'answer'
          _view.answer.linkProperty("Text",  function() { return K1fcorrect; }, function(_v) { K1fcorrect = _v; } ); // HtmlView Page linking property 'Text' for element 'answer'
          _view.xymagnifycentre.linkProperty("X",  function() { return xmagnify; }, function(_v) { xmagnify = _v; } ); // HtmlView Page linking property 'X' for element 'xymagnifycentre'
          _view.xymagnifycentre.linkProperty("Y",  function() { return ymagnify; }, function(_v) { ymagnify = _v; } ); // HtmlView Page linking property 'Y' for element 'xymagnifycentre'
          _view.step.linkProperty("X",  function() { return xmagnify; }, function(_v) { xmagnify = _v; } ); // HtmlView Page linking property 'X' for element 'step'
          _view.step.linkProperty("Y",  function() { return ymagnify; }, function(_v) { ymagnify = _v; } ); // HtmlView Page linking property 'Y' for element 'step'
          _view.arrow22.setAction("OnPress", function(_data,_info) {
  if(x<=0||xdrag<=-160){
  x=0;
  xdrag = -160;
  }
  else {
  x=x-Math.abs(increment);
  vx=-Math.abs(vx);
  }
  xdrag=-160+x; //sync polygon xdrag with x
  _view._update();

}); // HtmlView Page setting action 'OnPress' for element 'arrow22'
          _view.arrow3.setAction("OnPress", function(_data,_info) {
  xdrag=-160+x; //sync polygon xdrag with x
  if(x>=xmax-x2){
  x=xmax-x2;
  xdrag=-160+x; //sync polygon xdrag with x
  }
  else {
  x=x+increment;
  xdrag=-160+x; //sync polygon xdrag with x
  }
  xdrag=-160+x; //sync polygon xdrag with x
  _view._update();

}); // HtmlView Page setting action 'OnPress' for element 'arrow3'
          _view.factor.linkProperty("Y",  function() { return factordrag; }, function(_v) { factordrag = _v; } ); // HtmlView Page linking property 'Y' for element 'factor'
          _view.factor.setAction("OnDrag", function(_data,_info) {
  if (factordrag<10)factordrag=10;
  if(factordrag>50) factordrag=50;
  factor =factordrag/10;
  ratiomagnify=wmagnify/factor;

}); // HtmlView Page setting action 'OnDrag' for element 'factor'
          _view.collate.setAction("OffClick", function(_data,_info) {
  display = "none";
  //_view.inputfield.getStyle().setDisplay("none");
  kheight=0.96;
  //_view.plottingPanel.getGraphics().setHeight(changeOrientation(0.95));

}); // HtmlView Page setting action 'OffClick' for element 'collate'
          _view.collate.setAction("OnClick", function(_data,_info) {
  display = "inline-flex";
  //_view.inputfield.getStyle().setDisplay("inline-flex");
  //changeOrientation(0.5);
  kheight=0.90;
  //_view.plottingPanel.getGraphics().setHeight(changeOrientation(0.85));
  //_view.plottingPanel.propertyChanged("Height","100%");
  //_view._update();

}); // HtmlView Page setting action 'OnClick' for element 'collate'
          _view.inputfield.linkProperty("Display",  function() { return display; }, function(_v) { display = _v; } ); // HtmlView Page linking property 'Display' for element 'inputfield'
          _view.comboBox.linkProperty("Options",  function() { return ["type?","0.02 mm v1","0.1 mm v1","0.05 mm v1","0.1 mm v2","0.05 mm v2","0.1 mm v3","0.1 mm v4"]; } ); // HtmlView Page linking property 'Options' for element 'comboBox'
          _view.comboBox.setAction("OnChange", function(_data,_info) {
  var opts = _view.comboBox.getProperty("SelectedOptions");  // array of options
      var option = (opts.length > 0)? opts[0]:""; // selected option 
  if(option=="hint show") {
    showhint=true;
  //show=true;
    }
    else if(option=="hint off") {
    showhint=false;
  //show=false;
    }
    else if(option=="cm show") {
    cmshow=true;
  dx2=9*dxm/20; // smaller means smaller widrh of vernier scale
    n2s=21;
    dycst=0.;
    nmode=2;
    L=10*dxm+size; // control length of veriner
    // added by wee for left right button
    // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10
    // increment = dxm/10 ;
    // l_unit="0.1mm";
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=true;
    }
     else if(option=="mm show") {
    
    cmshow=false;
   // alert(cmshow);
    }
    
   else if(option=="0.02 mm v1") {
    dycst=1.;
    n2s=51;
    dx2=49*dxm/50;
    nmode=5;
    L=50*dxm+size;
    unit=0.02;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.1 mm v1") {
    dycst=0.;
    n2s=51;
    dx2=49*dxm/50;
    nmode=5;
    L=50*dxm+size;
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.05 mm v1") {
    dx2=39*dxm/40*2; // control the spacing of the numbers on lower scale
    n2s=21; // number of intervals on the lower scale
    dycst=1.; // dycst=0; no minor ticks. dycst=1; draw minus ticks.
    nmode=2; // numbers position align with the ticks on lower scale
    L=40*dxm+size; // control the size of the lower scale in x direction
    // l_unit="0.05mm";
    unit=0.05;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.1 mm v2") {
    dx2=39*dxm/40*2;
    n2s=21;
    dycst=0.;
    nmode=2;
    L=40*dxm+size;
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.05 mm v2") {
    dx2=19*dxm/20;
    n2s=21;
    dycst=1.;
    nmode=2;
    L=20*dxm+size;
    // added by wee for left right button
    // increment = 0.25718;// take 257.16 divide 50 mm divide 20
    //  increment = dxm/20 ;
    // l_unit="0.05mm";
    unit=0.05;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.1 mm v3") {
    dx2=19*dxm/20;
    n2s=21;
    dycst=0.;
    nmode=2;
    L=20*dxm+size;
    // added by wee for left right button
    // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10
    // increment = dxm/10 ;
    // l_unit="0.1mm";
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  //lookang adding
  else if(option=="0.1 mm v4") {// added due to request by another version 0.1 mm Vernier constant where 10 divisions of vernier will coincide will 9 divisions of the main scale. {
    dx2=9*dxm/20; // smaller means smaller widrh of vernier scale
    n2s=21;
    dycst=0.;
    nmode=2;
    L=10*dxm+size; // control length of veriner
    // added by wee for left right button
    // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10
    // increment = dxm/10 ;
    // l_unit="0.1mm";
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
    else if (option=="External diameter"){
      botone=true;
  tail=false;
  topone=false;
  roundshapetype=true;
  h=w; // make as circle
  _view.plottingPanel.setProperty("MinimumX",-200);
  _view.plottingPanel.setProperty("MaximumX",250);
  _view.plottingPanel.setProperty("MinimumY",-100);
  _view.plottingPanel.setProperty("MaximumY",100);
      }
        else if (option=="Internal diameter"){
      botone=false;
  tail=false;
  topone=true;
  oy=-80 -h/2; // set object lower to prevent inside jaws cases
  _view.plottingPanel.setProperty("MinimumX",-175);
  _view.plottingPanel.setProperty("MaximumX",75);
  _view.plottingPanel.setProperty("MinimumY",-150);
  _view.plottingPanel.setProperty("MaximumY",150);
      }
        else if (option=="Depth"){
      botone=false;
  tail=true;
  topone=false;
  oy=-80 -h/2; // set object lower to prevent inside jaws cases
  _view.plottingPanel.setProperty("MinimumX",0);
  _view.plottingPanel.setProperty("MaximumX",300);
  _view.plottingPanel.setProperty("MinimumY",-150);
  _view.plottingPanel.setProperty("MaximumY",150);
      }
    
    //"magnify on","magnify off"
    else if(option=="magnify x1") {
   
  showmagnify=true;
  factor =1;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x2") {
   
  showmagnify=true;
  factor =2;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x3") {
   
  showmagnify=true;
  factor =3;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x4") {
   
  showmagnify=true;
  factor =4;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x5") {
   
  showmagnify=true;
  factor =5;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify off") {
   
  showmagnify=false;
  factor =1;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="answer show") {
   
  show=true;
    }
    else if(option=="answer off") {
    
  show=false;
    }
   else if(option=="object show") {
  botone=true;
  tail=false;
  topone=false;
  roundshapetype=false;
  _view.plottingPanel.setProperty("MinimumX",-175);
  _view.plottingPanel.setProperty("MaximumX",75);
  _view.plottingPanel.setProperty("MinimumY",-100);
  _view.plottingPanel.setProperty("MaximumY",120);
   }
   else if(option=="object off") {
  botone=false;
  tail=false;
  topone=false;
   }
   else if(option=="z err=-5") {
   error =-5; 
     }
   else if(option=="z err=-4") {
   error =-4; 
     }
     else if(option=="z err=-3") {
   error =-3; 
     }
     else if(option=="z err=-2") {
   error =-2; 
     }
     else if(option=="z err=-1") {
   error =-1; 
     }
     else if(option=="zero error=0") {
   error =0; 
     }
     else if(option=="z err=5") {
   error =5; 
     }
   else if(option=="z err=4") {
   error =4; 
     }
     else if(option=="z err=3") {
   error =3; 
     }
     else if(option=="z err=2") {
   error =2; 
     }
     else if(option=="z err=1") {
   error =1; 
     }
   
  //_initialize(); // need this for zero error correctly shown
  /*
  if(parent.cordova) { // check it is running in Android
         parent.TTS.speak(option, function () {
              // success
          }, function (reason) {
              // error
          });
      }
      else {
    var msg = new SpeechSynthesisUtterance(option);
  window.speechSynthesis.speak(msg);
  }
  */
  //_initialize();

}); // HtmlView Page setting action 'OnChange' for element 'comboBox'
          _view.comboBox.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'comboBox'
          if (!testMode) {

          _view.comboBox2.linkProperty("Options",  function() { return ["hint show","hint off","answer show","answer off","object show","object off","External diameter","Internal diameter","Depth"]; } ); // HtmlView Page linking property 'Options' for element 'comboBox2'
          }else{
          _view.comboBox2.linkProperty("Options",  function() { return ["object show","object off","External diameter","Internal diameter","Depth"]; } ); // HtmlView Page linking property 'Options' for element 'comboBox2'

          }
          _view.comboBox2.setAction("OnChange", function(_data,_info) {
  var opts = _view.comboBox2.getProperty("SelectedOptions");  // array of options
      var option = (opts.length > 0)? opts[0]:""; // selected option 
  if(option=="hint show") {
    showhint=true;
  //show=true;
    }
    else if(option=="hint off") {
    showhint=false;
  //show=false;
    }
    else if(option=="cm show") {
    cmshow=true;
  dx2=9*dxm/20; // smaller means smaller widrh of vernier scale
    n2s=21;
    dycst=0.;
    nmode=2;
    L=10*dxm+size; // control length of veriner
    // added by wee for left right button
    // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10
    // increment = dxm/10 ;
    // l_unit="0.1mm";
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=true;
    }
     else if(option=="mm show") {
    
    cmshow=false;
   // alert(cmshow);
    }
    
   else if(option=="0.02 mm v1") {
    dycst=1.;
    n2s=51;
    dx2=49*dxm/50;
    nmode=5;
    L=50*dxm+size;
    unit=0.02;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.1 mm v1") {
    dycst=0.;
    n2s=51;
    dx2=49*dxm/50;
    nmode=5;
    L=50*dxm+size;
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.05 mm v1") {
    dx2=39*dxm/40*2; // control the spacing of the numbers on lower scale
    n2s=21; // number of intervals on the lower scale
    dycst=1.; // dycst=0; no minor ticks. dycst=1; draw minus ticks.
    nmode=2; // numbers position align with the ticks on lower scale
    L=40*dxm+size; // control the size of the lower scale in x direction
    // l_unit="0.05mm";
    unit=0.05;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.1 mm v2") {
    dx2=39*dxm/40*2;
    n2s=21;
    dycst=0.;
    nmode=2;
    L=40*dxm+size;
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.05 mm v2") {
    dx2=19*dxm/20;
    n2s=21;
    dycst=1.;
    nmode=2;
    L=20*dxm+size;
    // added by wee for left right button
    // increment = 0.25718;// take 257.16 divide 50 mm divide 20
    //  increment = dxm/20 ;
    // l_unit="0.05mm";
    unit=0.05;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.1 mm v3") {
    dx2=19*dxm/20;
    n2s=21;
    dycst=0.;
    nmode=2;
    L=20*dxm+size;
    // added by wee for left right button
    // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10
    // increment = dxm/10 ;
    // l_unit="0.1mm";
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  //lookang adding
  else if(option=="0.1 mm v4") {// added due to request by another version 0.1 mm Vernier constant where 10 divisions of vernier will coincide will 9 divisions of the main scale. {
    dx2=9*dxm/20; // smaller means smaller widrh of vernier scale
    n2s=21;
    dycst=0.;
    nmode=2;
    L=10*dxm+size; // control length of veriner
    // added by wee for left right button
    // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10
    // increment = dxm/10 ;
    // l_unit="0.1mm";
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
    else if (option=="External diameter"){
      botone=true;
  tail=false;
  topone=false;
  roundshapetype=true;
  h=w; // make as circle
  _view.plottingPanel.setProperty("MinimumX",-175);
  _view.plottingPanel.setProperty("MaximumX",75);
  _view.plottingPanel.setProperty("MinimumY",-100);
  _view.plottingPanel.setProperty("MaximumY",125);
      }
        else if (option=="Internal diameter"){
      botone=false;
  tail=false;
  topone=true;
  oy=-80 -h/2; // set object lower to prevent inside jaws cases
  _view.plottingPanel.setProperty("MinimumX",-175);
  _view.plottingPanel.setProperty("MaximumX",75);
  _view.plottingPanel.setProperty("MinimumY",-100);
  _view.plottingPanel.setProperty("MaximumY",150);
      }
        else if (option=="Depth"){
      botone=false;
  tail=true;
  topone=false;
  oy=-80 -h/2; // set object lower to prevent inside jaws cases
  _view.plottingPanel.setProperty("MinimumX",0);
  _view.plottingPanel.setProperty("MaximumX",300);
  _view.plottingPanel.setProperty("MinimumY",-150);
  _view.plottingPanel.setProperty("MaximumY",150);
      }
    
    //"magnify on","magnify off"
    else if(option=="magnify x1") {
   
  showmagnify=true;
  factor =1;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x2") {
   
  showmagnify=true;
  factor =2;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x3") {
   
  showmagnify=true;
  factor =3;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x4") {
   
  showmagnify=true;
  factor =4;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x5") {
   
  showmagnify=true;
  factor =5;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify off") {
   
  showmagnify=false;
  factor =1;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="answer show") {
   
  show=true;
    }
    else if(option=="answer off") {
    
  show=false;
    }
   else if(option=="object show") {
  botone=true;
  tail=false;
  topone=false;
  roundshapetype=false;
  _view.plottingPanel.setProperty("MinimumX",-175);
  _view.plottingPanel.setProperty("MaximumX",75);
  _view.plottingPanel.setProperty("MinimumY",-100);
  _view.plottingPanel.setProperty("MaximumY",120);
   }
   else if(option=="object off") {
  botone=false;
  tail=false;
  topone=false;
   }
   else if(option=="z err=-5") {
   error =-5; 
     }
   else if(option=="z err=-4") {
   error =-4; 
     }
     else if(option=="z err=-3") {
   error =-3; 
     }
     else if(option=="z err=-2") {
   error =-2; 
     }
     else if(option=="z err=-1") {
   error =-1; 
     }
     else if(option=="zero error=0") {
   error =0; 
     }
     else if(option=="z err=5") {
   error =5; 
     }
   else if(option=="z err=4") {
   error =4; 
     }
     else if(option=="z err=3") {
   error =3; 
     }
     else if(option=="z err=2") {
   error =2; 
     }
     else if(option=="z err=1") {
   error =1; 
     }
   
  //_initialize(); // need this for zero error correctly shown
  /*
  if(parent.cordova) { // check it is running in Android
         parent.TTS.speak(option, function () {
              // success
          }, function (reason) {
              // error
          });
      }
      else {
    var msg = new SpeechSynthesisUtterance(option);
  window.speechSynthesis.speak(msg);
  }
  */
  //_initialize();

}); // HtmlView Page setting action 'OnChange' for element 'comboBox2'
          _view.comboBox2.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'comboBox2'
          _view.comboBox3.linkProperty("Options",  function() { return ["zero error=0","z err=-9","z err=-8","z err=-7","z err=-6","z err=-5","z err=-4","z err=-3","z err=-2","z err=-1","","z err=1","z err=2","z err=3","z err=4","z err=5","z err=6","z err=7","z err=8","z err=9"]; } ); // HtmlView Page linking property 'Options' for element 'comboBox3'
          _view.comboBox3.setAction("OnChange", function(_data,_info) {
  var opts = _view.comboBox3.getProperty("SelectedOptions");  // array of options
      var option = (opts.length > 0)? opts[0]:""; // selected option 
  if(option=="hint show") {
    showhint=true;
  //show=true;
    }
    else if(option=="hint off") {
    showhint=false;
  //show=false;
    }
    else if(option=="cm show") {
    cmshow=true;
  dx2=9*dxm/20; // smaller means smaller widrh of vernier scale
    n2s=21;
    dycst=0.;
    nmode=2;
    L=10*dxm+size; // control length of veriner
    // added by wee for left right button
    // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10
    // increment = dxm/10 ;
    // l_unit="0.1mm";
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=true;
    }
     else if(option=="mm show") {
    
    cmshow=false;
   // alert(cmshow);
    }
    
   else if(option=="0.02 mm v1") {
    dycst=1.;
    n2s=51;
    dx2=49*dxm/50;
    nmode=5;
    L=50*dxm+size;
    unit=0.02;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.1 mm v1") {
    dycst=0.;
    n2s=51;
    dx2=49*dxm/50;
    nmode=5;
    L=50*dxm+size;
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.05 mm v1") {
    dx2=39*dxm/40*2; // control the spacing of the numbers on lower scale
    n2s=21; // number of intervals on the lower scale
    dycst=1.; // dycst=0; no minor ticks. dycst=1; draw minus ticks.
    nmode=2; // numbers position align with the ticks on lower scale
    L=40*dxm+size; // control the size of the lower scale in x direction
    // l_unit="0.05mm";
    unit=0.05;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.1 mm v2") {
    dx2=39*dxm/40*2;
    n2s=21;
    dycst=0.;
    nmode=2;
    L=40*dxm+size;
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.05 mm v2") {
    dx2=19*dxm/20;
    n2s=21;
    dycst=1.;
    nmode=2;
    L=20*dxm+size;
    // added by wee for left right button
    // increment = 0.25718;// take 257.16 divide 50 mm divide 20
    //  increment = dxm/20 ;
    // l_unit="0.05mm";
    unit=0.05;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  else if(option=="0.1 mm v3") {
    dx2=19*dxm/20;
    n2s=21;
    dycst=0.;
    nmode=2;
    L=20*dxm+size;
    // added by wee for left right button
    // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10
    // increment = dxm/10 ;
    // l_unit="0.1mm";
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
  //lookang adding
  else if(option=="0.1 mm v4") {// added due to request by another version 0.1 mm Vernier constant where 10 divisions of vernier will coincide will 9 divisions of the main scale. {
    dx2=9*dxm/20; // smaller means smaller widrh of vernier scale
    n2s=21;
    dycst=0.;
    nmode=2;
    L=10*dxm+size; // control length of veriner
    // added by wee for left right button
    // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10
    // increment = dxm/10 ;
    // l_unit="0.1mm";
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=false;
  }
    else if (option=="External diameter"){
      botone=true;
  tail=false;
  topone=false;
  roundshapetype=true;
  h=w; // make as circle
  _view.plottingPanel.setProperty("MinimumX",-200);
  _view.plottingPanel.setProperty("MaximumX",250);
  _view.plottingPanel.setProperty("MinimumY",-100);
  _view.plottingPanel.setProperty("MaximumY",100);
      }
        else if (option=="Internal diameter"){
      botone=false;
  tail=false;
  topone=true;
  oy=-80 -h/2; // set object lower to prevent inside jaws cases
  _view.plottingPanel.setProperty("MinimumX",-175);
  _view.plottingPanel.setProperty("MaximumX",75);
  _view.plottingPanel.setProperty("MinimumY",-150);
  _view.plottingPanel.setProperty("MaximumY",150);
      }
        else if (option=="Depth"){
      botone=false;
  tail=true;
  topone=false;
  oy=-80 -h/2; // set object lower to prevent inside jaws cases
  _view.plottingPanel.setProperty("MinimumX",0);
  _view.plottingPanel.setProperty("MaximumX",300);
  _view.plottingPanel.setProperty("MinimumY",-150);
  _view.plottingPanel.setProperty("MaximumY",150);
      }
    
    //"magnify on","magnify off"
    else if(option=="magnify x1") {
   
  showmagnify=true;
  factor =1;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x2") {
   
  showmagnify=true;
  factor =2;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x3") {
   
  showmagnify=true;
  factor =3;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x4") {
   
  showmagnify=true;
  factor =4;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify x5") {
   
  showmagnify=true;
  factor =5;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="magnify off") {
   
  showmagnify=false;
  factor =1;
  ratiomagnify=wmagnify/factor;
    }
    else if(option=="answer show") {
   
  show=true;
    }
    else if(option=="answer off") {
    
  show=false;
    }
   else if(option=="object show") {
  botone=true;
  tail=false;
  topone=false;
  roundshapetype=false;
  _view.plottingPanel.setProperty("MinimumX",-175);
  _view.plottingPanel.setProperty("MaximumX",75);
  _view.plottingPanel.setProperty("MinimumY",-100);
  _view.plottingPanel.setProperty("MaximumY",120);
   }
   else if(option=="object off") {
  botone=false;
  tail=false;
  topone=false;
   }
   else if(option=="z err=-9") {
   error =-9; 
     }
   else if(option=="z err=-8") {
   error =-8; 
     }
   else if(option=="z err=-7") {
   error =-7; 
     }
   else if(option=="z err=-6") {
   error =-6; 
     }
   else if(option=="z err=-5") {
   error =-5; 
     }
   else if(option=="z err=-4") {
   error =-4; 
     }
     else if(option=="z err=-3") {
   error =-3; 
     }
     else if(option=="z err=-2") {
   error =-2; 
     }
     else if(option=="z err=-1") {
   error =-1; 
     }
     else if(option=="zero error=0") {
   error =0; 
     }
     else if(option=="z err=9") {
   error =9; 
     }
   else if(option=="z err=8") {
   error =8; 
     }
   else if(option=="z err=7") {
   error =7; 
     }
   else if(option=="z err=6") {
   error =6; 
     }
     else if(option=="z err=5") {
   error =5; 
     }
   else if(option=="z err=4") {
   error =4; 
     }
     else if(option=="z err=3") {
   error =3; 
     }
     else if(option=="z err=2") {
   error =2; 
     }
     else if(option=="z err=1") {
   error =1; 
     }
   
  _initialize(); // need this for zero error correctly shown
  /*
  if(parent.cordova) { // check it is running in Android
         parent.TTS.speak(option, function () {
              // success
          }, function (reason) {
              // error
          });
      }
      else {
    var msg = new SpeechSynthesisUtterance(option);
  window.speechSynthesis.speak(msg);
  }
  */
  //_initialize();

}); // HtmlView Page setting action 'OnChange' for element 'comboBox3'
          _view.comboBox3.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'comboBox3'
          _view.playPauseButton.setAction("OffClick", function(_data,_info) {
  text="paused";
  _pause();

}); // HtmlView Page setting action 'OffClick' for element 'playPauseButton'
          _view.playPauseButton.linkProperty("State",  function() { return _isPaused; } ); // HtmlView Page linking property 'State' for element 'playPauseButton'
          _view.playPauseButton.setAction("OnClick", function(_data,_info) {
  _play();
  text="playing";

}); // HtmlView Page setting action 'OnClick' for element 'playPauseButton'
          _view.playPauseButton.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'playPauseButton'
          _view.resetButtonAdsMob.setAction("OnClick", function(_data,_info) {
  showBannerAd();
  if (Math.random()<0.5){
  showInterstitialAds();
  }
  else{
  showRewardVideo();
  }
  _reset();

}); // HtmlView Page setting action 'OnClick' for element 'resetButtonAdsMob'
          _view.resetButtonAdsMob.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'resetButtonAdsMob'
          _view.resetButtonAdsMob.linkProperty("Display",  function() { return (iOSapp||Androidapp)?"inline-block":"none"; } ); // HtmlView Page linking property 'Display' for element 'resetButtonAdsMob'
          _view.resetButton.setAction("OnClick", function(_data,_info) {
  //showBannerAd();
  _reset();

}); // HtmlView Page setting action 'OnClick' for element 'resetButton'
          _view.resetButton.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'resetButton'
          _view.answer2.linkProperty("Background",  function() { return K1fcorrectbackground; }, function(_v) { K1fcorrectbackground = _v; } ); // HtmlView Page linking property 'Background' for element 'answer2'
          _view.answer2.setAction("OnClick", function(_data,_info) {
  if (inputdropmenu==true){
    inputdropmenu=false;
    }
    else if (inputdropmenu==false){
    inputdropmenu=true;
    }

}); // HtmlView Page setting action 'OnClick' for element 'answer2'
          _view.answer2.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'answer2'
          _view.cm.linkProperty("Width",  function() { return (cmshow)?"10%":"0"; } ); // HtmlView Page linking property 'Width' for element 'cm'
          _view.cm.linkProperty("Options",  function() { return ["0.00","0.01","0.02","0.03","0.04","0.05","0.06","0.07","0.08","0.09","0.10","0.11","0.12","0.13","0.14","0.15","0.16","0.17","0.18","0.19","0.20","0.21","0.22","0.23","0.24","0.25","0.26","0.27","0.28","0.29","0.30","0.31","0.32","0.33","0.34","0.35","0.36","0.37","0.38","0.39","0.40","0.41","0.42","0.43","0.44","0.45","0.46","0.47","0.48","0.49","0.50","0.51","0.52","0.53","0.54","0.55","0.56","0.57","0.58","0.59","0.60","0.61","0.62","0.63","0.64","0.65","0.66","0.67","0.68","0.69","0.70","0.71","0.72","0.73","0.74","0.75","0.76","0.77","0.78","0.79","0.80","0.81","0.82","0.83","0.84","0.85","0.86","0.87","0.88","0.89","0.90","0.91","0.92","0.93","0.94","0.95","0.96","0.97","0.98","0.99","1.00","1.01","1.02","1.03","1.04","1.05","1.06","1.07","1.08","1.09","1.10","1.11","1.12","1.13","1.14","1.15","1.16","1.17","1.18","1.19","1.20","1.21","1.22","1.23","1.24","1.25","1.26","1.27","1.28","1.29","1.30","1.31","1.32","1.33","1.34","1.35","1.36","1.37","1.38","1.39","1.40","1.41","1.42","1.43","1.44","1.45","1.46","1.47","1.48","1.49","1.50","1.51","1.52","1.53","1.54","1.55","1.56","1.57","1.58","1.59","1.60","1.61","1.62","1.63","1.64","1.65","1.66","1.67","1.68","1.69","1.70","1.71","1.72","1.73","1.74","1.75","1.76","1.77","1.78","1.79","1.80","1.81","1.82","1.83","1.84","1.85","1.86","1.87","1.88","1.89","1.90","1.91","1.92","1.93","1.94","1.95","1.96","1.97","1.98","1.99","2.00","2.01","2.02","2.03","2.04","2.05","2.06","2.07","2.08","2.09","2.10","2.11","2.12","2.13","2.14","2.15","2.16","2.17","2.18","2.19","2.20","2.21","2.22","2.23","2.24","2.25","2.26","2.27","2.28","2.29","2.30","2.31","2.32","2.33","2.34","2.35","2.36","2.37","2.38","2.39","2.40","2.41","2.42","2.43","2.44","2.45","2.46","2.47","2.48","2.49","2.50","2.51","2.52","2.53","2.54","2.55","2.56","2.57","2.58","2.59","2.60","2.61","2.62","2.63","2.64","2.65","2.66","2.67","2.68","2.69","2.70","2.71","2.72","2.73","2.74","2.75","2.76","2.77","2.78","2.79","2.80","2.81","2.82","2.83","2.84","2.85","2.86","2.87","2.88","2.89","2.90","2.91","2.92","2.93","2.94","2.95","2.96","2.97","2.98","2.99"   ,"3.00","3.01","3.02","3.03","3.04","3.05","3.06","3.07","3.08","3.09","3.10","3.11","3.12","3.13","3.14","3.15","3.16","3.17","3.18","3.19","3.20","3.21","3.22","3.23","3.24","3.25","3.26","3.27","3.28","3.29","3.30","3.31","3.32","3.33","3.34","3.35","3.36","3.37","3.38","3.39","3.40","3.41","3.42","3.43","3.44","3.45","3.46","3.47","3.48","3.49","3.50","3.51","3.52","3.53","3.54","3.55","3.56","3.57","3.58","3.59","3.60","3.61","3.62","3.63","3.64","3.65","3.66","3.67","3.68","3.69","3.70","3.71","3.72","3.73","3.74","3.75","3.76","3.77","3.78","3.79","3.80","3.81","3.82","3.83","3.84","3.85","3.86","3.87","3.88","3.89","3.90","3.91","3.92","3.93","3.94","3.95","3.96","3.97","3.98","3.99","4.00","4.01","4.02","4.03","4.04","4.05","4.06","4.07","4.08","4.09","4.10","4.11","4.12","4.13","4.14","4.15","4.16","4.17","4.18","4.19","4.20","4.21","4.22","4.23","4.24","4.25","4.26","4.27","4.28","4.29","4.30","4.31","4.32","4.33","4.34","4.35","4.36","4.37","4.38","4.39","4.40","4.41","4.42","4.43","4.44","4.45","4.46","4.47","4.48","4.49","4.50","4.51","4.52","4.53","4.54","4.55","4.56","4.57","4.58","4.59","4.60","4.61","4.62","4.63","4.64","4.65","4.66","4.67","4.68","4.69","4.70","4.71","4.72","4.73","4.74","4.75","4.76","4.77","4.78","4.79","4.80","4.81","4.82","4.83","4.84","4.85","4.86","4.87","4.88","4.89","4.90","4.91","4.92","4.93","4.94","4.95","4.96","4.97","4.98","4.99","5.00","5.01","5.02","5.03","5.04","5.05","5.06","5.07","5.08","5.09","5.10","5.11","5.12","5.13","5.14","5.15","5.16","5.17","5.18","5.19","5.20","5.21","5.22","5.23","5.24","5.25","5.26","5.27","5.28","5.29","5.30","5.31","5.32","5.33","5.34","5.35","5.36","5.37","5.38","5.39","5.40","5.41","5.42","5.43","5.44","5.45","5.46","5.47","5.48","5.49","5.50","5.51","5.52","5.53","5.54","5.55","5.56","5.57","5.58","5.59","5.60","5.61","5.62","5.63","5.64","5.65","5.66","5.67","5.68","5.69","5.70","5.71","5.72","5.73","5.74","5.75","5.76","5.77","5.78","5.79","5.80","5.81","5.82","5.83","5.84","5.85","5.86","5.87","5.88","5.89","5.90","5.91","5.92","5.93","5.94","5.95","5.96","5.97","5.98","5.99","6.00"]; } ); // HtmlView Page linking property 'Options' for element 'cm'
          _view.cm.setAction("OnChange", function(_data,_info) {
  var opts = _view.cm.getProperty("SelectedOptions");  // array of options
      var option = (opts.length > 0)? opts[0]:""; // selected option 
  l_enterK1f =option; //convert to mm *10
  showAnswerFlag=true;
  counter =1; // make speak once
     if(parent.cordova) { // check it is running in Android
         parent.TTS.speak(option, function () {
              // success
          }, function (reason) {
              // error
          });
      }
      else {
    var msg = new SpeechSynthesisUtterance(option);
  window.speechSynthesis.speak(msg);
  }

}); // HtmlView Page setting action 'OnChange' for element 'cm'
          _view.cm.linkProperty("Visibility",  function() { return cmshow; }, function(_v) { cmshow = _v; } ); // HtmlView Page linking property 'Visibility' for element 'cm'
          _view.cm.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'cm'
          _view.cm.linkProperty("Display",  function() { return inputdropmenu?"inline-block":"none"; } ); // HtmlView Page linking property 'Display' for element 'cm'
          _view.mm.linkProperty("Width",  function() { return (cmshow)?"0":"10%"; } ); // HtmlView Page linking property 'Width' for element 'mm'
          _view.mm.linkProperty("Options",  function() { return ["0.0","0.1","0.2","0.3","0.4","0.5","0.6","0.7","0.8","0.9","1.0","1.1","1.2","1.3","1.4","1.5","1.6","1.7","1.8","1.9","2.0","2.1","2.2","2.3","2.4","2.5","2.6","2.7","2.8","2.9","3.0","3.1","3.2","3.3","3.4","3.5","3.6","3.7","3.8","3.9","4.0","4.1","4.2","4.3","4.4","4.5","4.6","4.7","4.8","4.9","5.0","5.1","5.2","5.3","5.4","5.5","5.6","5.7","5.8","5.9","6.0","6.1","6.2","6.3","6.4","6.5","6.6","6.7","6.8","6.9", "7.0","7.1","7.2","7.3","7.4","7.5","7.6","7.7","7.8","7.9","8.0","8.1","8.2","8.3","8.4","8.5","8.6","8.7","8.8","8.9","9.0","9.1","9.2","9.3","9.4","9.5","9.6","9.7","9.8","9.9","10.0","10.1","10.2","10.3","10.4","10.5","10.6","10.7","10.8","10.9","11.0","11.1","11.2","11.3","11.4","11.5","11.6","11.7","11.8","11.9","12.0","12.1","12.2","12.3","12.4","12.5","12.6","12.7","12.8","12.9","13.0","13.1","13.2","13.3","13.4","13.5","13.6","13.7","13.8","13.9","14.0","14.1","14.2","14.3","14.4","14.5","14.6","14.7","14.8","14.9","15.0","15.1","15.2","15.3","15.4","15.5","15.6","15.7","15.8","15.9","16.0","16.1","16.2","16.3","16.4","16.5","16.6","16.7","16.8","16.9", "17.0","17.1","17.2","17.3","17.4","17.5","17.6","17.7","17.8","17.9","18.0","18.1","18.2","18.3","18.4","18.5","18.6","18.7","18.8","18.9","19.0","19.1","19.2","19.3","19.4","19.5","19.6","19.7","19.8","19.9","20.0","20.1","20.2","20.3","20.4","20.5","20.6","20.7","20.8","20.9","21.0","21.1","21.2","21.3","21.4","21.5","21.6","21.7","21.8","21.9","22.0","22.1","22.2","22.3","22.4","22.5","22.6","22.7","22.8","22.9","23.0","23.1","23.2","23.3","23.4","23.5","23.6","23.7","23.8","23.9","24.0","24.1","24.2","24.3","24.4","24.5","24.6","24.7","24.8","24.9","25.0","25.1","25.2","25.3","25.4","25.5","25.6","25.7","25.8","25.9","26.0","26.1","26.2","26.3","26.4","26.5","26.6","26.7","26.8","26.9", "27.0","27.1","27.2","27.3","27.4","27.5","27.6","27.7","27.8","27.9","28.0","28.1","28.2","28.3","28.4","28.5","28.6","28.7","28.8","28.9","29.0","29.1","29.2","29.3","29.4","29.5","29.6","29.7","29.8","29.9","30.0","30.1","30.2","30.3","30.4","30.5","30.6","30.7","30.8","30.9","31.0","31.1","31.2","31.3","31.4","31.5","31.6","31.7","31.8","31.9","32.0","32.1","32.2","32.3","32.4","32.5","32.6","32.7","32.8","32.9","33.0","33.1","33.2","33.3","33.4","33.5","33.6","33.7","33.8","33.9","34.0","34.1","34.2","34.3","34.4","34.5","34.6","34.7","34.8","34.9","35.0","35.1","35.2","35.3","35.4","35.5","35.6","35.7","35.8","35.9","36.0","36.1","36.2","36.3","36.4","36.5","36.6","36.7","36.8","36.9", "37.0","37.1","37.2","37.3","37.4","37.5","37.6","37.7","37.8","37.9","38.0","38.1","38.2","38.3","38.4","38.5","38.6","38.7","38.8","38.9","39.0","39.1","39.2","39.3","39.4","39.5","39.6","39.7","39.8","39.9","40.0","40.1","40.2","40.3","40.4","40.5","40.6","40.7","40.8","40.9","41.0","41.1","41.2","41.3","41.4","41.5","41.6","41.7","41.8","41.9","42.0","42.1","42.2","42.3","42.4","42.5","42.6","42.7","42.8","42.9","43.0","43.1","43.2","43.3","43.4","43.5","43.6","43.7","43.8","43.9","44.0","44.1","44.2","44.3","44.4","44.5","44.6","44.7","44.8","44.9","45.0","45.1","45.2","45.3","45.4","45.5","45.6","45.7","45.8","45.9","46.0","46.1","46.2","46.3","46.4","46.5","46.6","46.7","46.8","46.9", "47.0","47.1","47.2","47.3","47.4","47.5","47.6","47.7","47.8","47.9","48.0","48.1","48.2","48.3","48.4","48.5","48.6","48.7","48.8","48.9","49.0","49.1","49.2","49.3","49.4","49.5","49.6","49.7","49.8","49.9","50.0","50.1","50.2","50.3","50.4","50.5","50.6","50.7","50.8","50.9","51.0","51.1","51.2","51.3","51.4","51.5","51.6","51.7","51.8","51.9","52.0","52.1","52.2","52.3","52.4","52.5","52.6","52.7","52.8","52.9","53.0","53.1","53.2","53.3","53.4","53.5","53.6","53.7","53.8","53.9","54.0","54.1","54.2","54.3","54.4","54.5","54.6","54.7","54.8","54.9","55.0","55.1","55.2","55.3","55.4","55.5","55.6","55.7","55.8","55.9","56.0","56.1","56.2","56.3","56.4","56.5","56.6","56.7","56.8","56.9", "57.0","57.1","57.2","57.3","57.4","57.5","57.6","57.7","57.8","57.9","58.0","58.1","58.2","58.3","58.4","58.5","58.6","58.7","58.8","58.9","59.0","59.1","59.2","59.3","59.4","59.5","59.6","59.7","59.8","59.9","60.0"]; } ); // HtmlView Page linking property 'Options' for element 'mm'
          _view.mm.setAction("OnChange", function(_data,_info) {
  var opts = _view.mm.getProperty("SelectedOptions");  // array of options
      var option = (opts.length > 0)? opts[0]:""; // selected option 
  l_enterK1f =option;
  showAnswerFlag=true;
  counter =1; // make speak once
     if(parent.cordova) { // check it is running in Android
         parent.TTS.speak(option, function () {
              // success
          }, function (reason) {
              // error
          });
      }
      else {
    var msg = new SpeechSynthesisUtterance(option);
  window.speechSynthesis.speak(msg);
  }

}); // HtmlView Page setting action 'OnChange' for element 'mm'
          _view.mm.linkProperty("Visibility",  function() { return !cmshow; } ); // HtmlView Page linking property 'Visibility' for element 'mm'
          _view.mm.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'mm'
          _view.mm.linkProperty("Display",  function() { return inputdropmenu?"inline-block":"none"; } ); // HtmlView Page linking property 'Display' for element 'mm'
          _view.textField2.linkProperty("Background",  function() { return K1fcorrectbackground; }, function(_v) { K1fcorrectbackground = _v; } ); // HtmlView Page linking property 'Background' for element 'textField2'
          _view.textField2.linkProperty("Value",  function() { return l_enterK1f; }, function(_v) { l_enterK1f = _v; } ); // HtmlView Page linking property 'Value' for element 'textField2'
          _view.textField2.setAction("OnChange", function(_data,_info) {
  showAnswerFlag=true;
  counter =1; // make speak once;

}); // HtmlView Page setting action 'OnChange' for element 'textField2'
          _view.textField2.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'textField2'
          _view.textField2.linkProperty("Display",  function() { return !inputdropmenu?"inline-block":"none"; } ); // HtmlView Page linking property 'Display' for element 'textField2'
          _view.mm2.linkProperty("Width",  function() { return (cmshow)?"0":"5%"; } ); // HtmlView Page linking property 'Width' for element 'mm2'
          _view.mm2.linkProperty("Background",  function() { return K1fcorrectbackground; }, function(_v) { K1fcorrectbackground = _v; } ); // HtmlView Page linking property 'Background' for element 'mm2'
          _view.mm2.linkProperty("Visibility",  function() { return !cmshow; } ); // HtmlView Page linking property 'Visibility' for element 'mm2'
          _view.mm2.setAction("OnClick", function(_data,_info) {
  cmshow=true;
  dx2=9*dxm/20; // smaller means smaller widrh of vernier scale
    n2s=21;
    dycst=0.;
    nmode=2;
    L=10*dxm+size; // control length of veriner
    // added by wee for left right button
    // increment = 0.25718*2;// take 257.16 divide 50 mm divide 10
    // increment = dxm/10 ;
    // l_unit="0.1mm";
    unit=0.1;
    increment = dxm/(1/unit);
    cmshow=true;
    _view.comboBox.setSelectedOptions(["cm show"]);

}); // HtmlView Page setting action 'OnClick' for element 'mm2'
          _view.mm2.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'mm2'
          _view.cm2.linkProperty("Width",  function() { return (cmshow)?"5%":"0"; } ); // HtmlView Page linking property 'Width' for element 'cm2'
          _view.cm2.linkProperty("Background",  function() { return K1fcorrectbackground; }, function(_v) { K1fcorrectbackground = _v; } ); // HtmlView Page linking property 'Background' for element 'cm2'
          _view.cm2.linkProperty("Visibility",  function() { return cmshow; }, function(_v) { cmshow = _v; } ); // HtmlView Page linking property 'Visibility' for element 'cm2'
          _view.cm2.setAction("OnClick", function(_data,_info) {
  cmshow=false;
     _view.comboBox.setSelectedOptions(["mm show"]);

}); // HtmlView Page setting action 'OnClick' for element 'cm2'
          _view.cm2.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'cm2'
          break;
      } // end of switch
    }; // end of new reset

    _model.setView(_view);
    _model.reset();
    _view._enableEPub();
  } // end of _selectView

  _model.setAutoplay(false);
  _model.setFPS(20);
  _model.setStepsPerDisplay(1);
  _selectView(_model._autoSelectView(_getViews())); // this includes _model.reset()
  return _model;
}

function AAPTVernierCaliper_View (_topFrame,_viewNumber,_libraryPath,_codebasePath) {
  var _view;
  switch(_viewNumber) {
    case -10 : break; // make Lint happy
    default :
    case 0: _view = AAPTVernierCaliper_View_0 (_topFrame); break;
  } // end of switch

  if (_codebasePath) _view._setResourcePath(_codebasePath);

  if (_libraryPath) _view._setLibraryPath(_libraryPath);

  _view._addDescriptionPage('About','./AAPTVernierCaliper_Intro_1.html');
  _view._addDescriptionPage('VernierCaliper','./VernierCaliper/VernierCaliper.html');

  return _view;
} // end of main function

function AAPTVernierCaliper_View_0 (_topFrame) {
  var _view = EJSS_CORE.createView(_topFrame);

  _view._reset = function() {
    _view._clearAll();
    _view._addElement(EJSS_INTERFACE.panel,"full", _view._topFrame) // EJsS HtmlView.HtmlView Page: declaration of element 'full'
      .setProperty("Height","100%") // EJsS HtmlView.HtmlView Page: setting property 'Height' for element 'full'
      .setProperty("Width","100%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'full'
      .setProperty("Background","Cyan") // EJsS HtmlView.HtmlView Page: setting property 'Background' for element 'full'
      ;

    _view._addElement(EJSS_INTERFACE.panel,"panel", _view.full) // EJsS HtmlView.HtmlView Page: declaration of element 'panel'
      .setProperty("Height","100%") // EJsS HtmlView.HtmlView Page: setting property 'Height' for element 'panel'
      .setProperty("Width","100%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'panel'
      .setProperty("CSS",{   "position" : "absolute",   "top" : "0%",    "margin-left":"0px",    "left":"0%" }) // EJsS HtmlView.HtmlView Page: setting property 'CSS' for element 'panel'
      ;

    _view._addElement(EJSS_DRAWING2D.plottingPanel,"plottingPanel", _view.panel) // EJsS HtmlView.HtmlView Page: declaration of element 'plottingPanel'
      .setProperty("Gutters",[0,0,0,0]) // EJsS HtmlView.HtmlView Page: setting property 'Gutters' for element 'plottingPanel'
      .setProperty("ShowAreaRectangle",false) // EJsS HtmlView.HtmlView Page: setting property 'ShowAreaRectangle' for element 'plottingPanel'
      .setProperty("ShowCoordinates",true) // EJsS HtmlView.HtmlView Page: setting property 'ShowCoordinates' for element 'plottingPanel'
      .setProperty("EnabledZooming",true) // EJsS HtmlView.HtmlView Page: setting property 'EnabledZooming' for element 'plottingPanel'
      .setProperty("AllowScalingDragging",true) // EJsS HtmlView.HtmlView Page: setting property 'AllowScalingDragging' for element 'plottingPanel'
      .setProperty("GridXShow",false) // EJsS HtmlView.HtmlView Page: setting property 'GridXShow' for element 'plottingPanel'
      .setProperty("Enabled",true) // EJsS HtmlView.HtmlView Page: setting property 'Enabled' for element 'plottingPanel'
      .setProperty("Title","Vernier Caliper Model") // EJsS HtmlView.HtmlView Page: setting property 'Title' for element 'plottingPanel'
      .setProperty("MaximumY",120) // EJsS HtmlView.HtmlView Page: setting property 'MaximumY' for element 'plottingPanel'
      .setProperty("MaximumX",75) // EJsS HtmlView.HtmlView Page: setting property 'MaximumX' for element 'plottingPanel'
      .setProperty("EnabledDragging","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledDragging' for element 'plottingPanel'
      .setProperty("GridYShow",false) // EJsS HtmlView.HtmlView Page: setting property 'GridYShow' for element 'plottingPanel'
      .setProperty("MinimumX",-175) // EJsS HtmlView.HtmlView Page: setting property 'MinimumX' for element 'plottingPanel'
      .setProperty("MinimumY",-100) // EJsS HtmlView.HtmlView Page: setting property 'MinimumY' for element 'plottingPanel'
      .setProperty("AutoScaleY",false) // EJsS HtmlView.HtmlView Page: setting property 'AutoScaleY' for element 'plottingPanel'
      .setProperty("AutoScaleX",false) // EJsS HtmlView.HtmlView Page: setting property 'AutoScaleX' for element 'plottingPanel'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"circlepush", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'circlepush'
      .setProperty("FillColor","Yellow") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'circlepush'
      .setProperty("RelativePosition","EAST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'circlepush'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'circlepush'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"topnutscrewSVG", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'topnutscrewSVG'
      .setProperty("FillColor","url(#mygrandient1)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'topnutscrewSVG'
      .setProperty("RelativePosition","SOUTH") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'topnutscrewSVG'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'topnutscrewSVG'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"topnutSVG", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'topnutSVG'
      .setProperty("FillColor","url(#mygrandient1)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'topnutSVG'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'topnutSVG'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"tail2", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'tail2'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'tail2'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"tail", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'tail'
      .setProperty("FillColor","url(#mygrandientgolden)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'tail'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"top", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'top'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"top2", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'top2'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'top2'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'top2'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'top2'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'top2'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"xy71", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'xy71'
      .setProperty("PointsY",[0,1.712,3.766,50,50,40,40,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'xy71'
      .setProperty("PointsX",[0,-2.739,-5.250,-19.63,-1,-1,0,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'xy71'
      .setProperty("FillColor","Cyan") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'xy71'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'xy71'
      .setProperty("X",-160) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'xy71'
      .setProperty("SizeY",1.41) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'xy71'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'xy71'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"ruler", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'ruler'
      .setProperty("FillColor","url(#mygrandient2)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'ruler'
      .setProperty("SizeX",380) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'ruler'
      .setProperty("RelativePosition","SOUTH_WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'ruler'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'ruler'
      .setProperty("X",-180) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'ruler'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'ruler'
      .setProperty("SizeY",70) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'ruler'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"bottomcasing", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'bottomcasing'
      .setProperty("PointsY",[0,1.712,3.766,50,55 ,55 ,50 ,50 ,50,40,40,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'bottomcasing'
      .setProperty("PointsX",[0,-2.739,-5.250,-19.63,-20 ,360.0 ,360 ,1.324 ,-1,-1,0,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'bottomcasing'
      .setProperty("FillColor","url(#mygrandient3)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'bottomcasing'
      .setProperty("X",-160) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'bottomcasing'
      .setProperty("SizeY",1.4) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'bottomcasing'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"topcasing", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'topcasing'
      .setProperty("FillColor","url(#mygrandient3)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'topcasing'
      .setProperty("SizeX",380) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'topcasing'
      .setProperty("RelativePosition","NORTH_WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'topcasing'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'topcasing'
      .setProperty("X",-180) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'topcasing'
      .setProperty("Y",70) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'topcasing'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"xy7smalltipsshapeSVG4", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'xy7smalltipsshapeSVG4'
      .setProperty("PointsY",[0,1.255,3.5,10,10,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'xy7smalltipsshapeSVG4'
      .setProperty("PointsX",[0,-1.2,-3.5,-3.5,0,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'xy7smalltipsshapeSVG4'
      .setProperty("FillColor","url(#mygrandient4)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'xy7smalltipsshapeSVG4'
      .setProperty("X",-160) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'xy7smalltipsshapeSVG4'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"xy7top", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'xy7top'
      .setProperty("PointsY",[0,-1.201,-3.597,-7.362,-11.24,-26,-26,-25.05,-22.65,-15.46,-13.29,-12.84,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'xy7top'
      .setProperty("PointsX",[0,2.948,5.800,8.424,9.679,9.679,0,1.921,3.5,3.5,1.693,0,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'xy7top'
      .setProperty("FillColor","url(#mygrandient3)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'xy7top'
      .setProperty("SizeX",1.5) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'xy7top'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'xy7top'
      .setProperty("X",-160) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'xy7top'
      .setProperty("Y",96) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'xy7top'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"xy7topsmallpiece", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'xy7topsmallpiece'
      .setProperty("PointsY",[0,-0.725,-2.356,-4.892,-17,-17,-15.5,-13.59,-12.87]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'xy7topsmallpiece'
      .setProperty("PointsX",[0.000,1.812,4.530,6.704,7.067,3.5,3.5,1.993,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'xy7topsmallpiece'
      .setProperty("FillColor","LightGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'xy7topsmallpiece'
      .setProperty("SizeX",1.5) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'xy7topsmallpiece'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'xy7topsmallpiece'
      .setProperty("X",-160) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'xy7topsmallpiece'
      .setProperty("Y",96) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'xy7topsmallpiece'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"dragme2", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'dragme2'
      .setProperty("FillColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'dragme2'
      .setProperty("SizeX",10) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'dragme2'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'dragme2'
      .setProperty("SizeY",10) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'dragme2'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'dragme2'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'dragme2'
      ;

    _view._addElement(EJSS_DRAWING2D.segmentSet,"segmentSet", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'segmentSet'
      .setProperty("LineColor","White") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'segmentSet'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'segmentSet'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"cmshow", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'cmshow'
      .setProperty("FillColor","White") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'cmshow'
      .setProperty("SizeX",10) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'cmshow'
      .setProperty("LineColor","White") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'cmshow'
      .setProperty("Text","cm 🇸🇬") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'cmshow'
      .setProperty("SizeY",10) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'cmshow'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'cmshow'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'cmshow'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"unitLabel", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'unitLabel'
      .setProperty("FillColor","White") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'unitLabel'
      .setProperty("SizeX",10) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'unitLabel'
      .setProperty("LineColor","White") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'unitLabel'
      .setProperty("Text","mm") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'unitLabel'
      .setProperty("SizeY",10) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'unitLabel'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'unitLabel'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'unitLabel'
      ;

    _view._addElement(EJSS_DRAWING2D.textSet,"textSetnumberonmainscale", _view.top) // EJsS HtmlView.HtmlView Page: declaration of element 'textSetnumberonmainscale'
      .setProperty("FillColor","White") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'textSetnumberonmainscale'
      .setProperty("RelativePosition","SOUTH") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'textSetnumberonmainscale'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'textSetnumberonmainscale'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"bottom3", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'bottom3'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"polygon", _view.bottom3) // EJsS HtmlView.HtmlView Page: declaration of element 'polygon'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'polygon'
      .setProperty("MovesGroup",true) // EJsS HtmlView.HtmlView Page: setting property 'MovesGroup' for element 'polygon'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'polygon'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'polygon'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"xdrag", _view.bottom3) // EJsS HtmlView.HtmlView Page: declaration of element 'xdrag'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"bottomdrawingSVG2", _view.xdrag) // EJsS HtmlView.HtmlView Page: declaration of element 'bottomdrawingSVG2'
      .setProperty("PointsY",[0,95,95,120,120,60,60,10.86,4.656,1.862]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'bottomdrawingSVG2'
      .setProperty("PointsX",[0,0,3,3,600,600,43.35,14.18,9.520,4.863]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'bottomdrawingSVG2'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'bottomdrawingSVG2'
      .setProperty("Sensitivity",0) // EJsS HtmlView.HtmlView Page: setting property 'Sensitivity' for element 'bottomdrawingSVG2'
      .setProperty("SizeX",0.4) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'bottomdrawingSVG2'
      .setProperty("LineColor","Gray") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'bottomdrawingSVG2'
      .setProperty("Y",-70) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'bottomdrawingSVG2'
      .setProperty("SizeY",0.58) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'bottomdrawingSVG2'
      .setProperty("LineWidth",3) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'bottomdrawingSVG2'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'bottomdrawingSVG2'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"bottomdrawingSVG", _view.xdrag) // EJsS HtmlView.HtmlView Page: declaration of element 'bottomdrawingSVG'
      .setProperty("PointsY",[0,95,95,120,120,60,60,10.86,4.656,1.862]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'bottomdrawingSVG'
      .setProperty("PointsX",[0,0,3,3,600,600,43.35,14.18,9.520,4.863]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'bottomdrawingSVG'
      .setProperty("FillColor","url(#mygrandientgolden)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'bottomdrawingSVG'
      .setProperty("Sensitivity",0) // EJsS HtmlView.HtmlView Page: setting property 'Sensitivity' for element 'bottomdrawingSVG'
      .setProperty("SizeX",0.4) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'bottomdrawingSVG'
      .setProperty("LineColor","Gray") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'bottomdrawingSVG'
      .setProperty("Y",-70) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'bottomdrawingSVG'
      .setProperty("SizeY",0.58) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'bottomdrawingSVG'
      .setProperty("LineWidth",3) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'bottomdrawingSVG'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'bottomdrawingSVG'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"screwSVG3", _view.bottom3) // EJsS HtmlView.HtmlView Page: declaration of element 'screwSVG3'
      .setProperty("PointsY",[0.133,0.133,-5.508,-5.195,-9.269,-10.84,-13.97,-12.72,-14.91,-16.79,-16.16,-14.91,-13.34,-14.28,-11.15,-9.895,-5.195,-5.195,-0.180]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'screwSVG3'
      .setProperty("PointsX",[5.564E-2,34.53,34.22,31.71,30.45,31.71,26.07,24.81,20.11,20.43,14.16,14.78,9.457,8.831,3.816,5.070,2.876,0.996,-0.258]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'screwSVG3'
      .setProperty("FillColor","url(#mygrandient3)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'screwSVG3'
      .setProperty("Y",-35) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'screwSVG3'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"xy7smalltipsshape2SVG4", _view.bottom3) // EJsS HtmlView.HtmlView Page: declaration of element 'xy7smalltipsshape2SVG4'
      .setProperty("PointsY",[0,1.255,3.5,10,10,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'xy7smalltipsshape2SVG4'
      .setProperty("PointsX",[0,1.2,3.5,3.5,0,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'xy7smalltipsshape2SVG4'
      .setProperty("FillColor","url(#mygrandient1)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'xy7smalltipsshape2SVG4'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'xy7smalltipsshape2SVG4'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"dragme", _view.bottom3) // EJsS HtmlView.HtmlView Page: declaration of element 'dragme'
      .setProperty("FillColor","Cyan") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'dragme'
      .setProperty("Sensitivity",100) // EJsS HtmlView.HtmlView Page: setting property 'Sensitivity' for element 'dragme'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'dragme'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'dragme'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'dragme'
      .setProperty("SizeY",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'dragme'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'dragme'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'dragme'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"dragme32", _view.bottom3) // EJsS HtmlView.HtmlView Page: declaration of element 'dragme32'
      .setProperty("Text","drag me") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'dragme32'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'dragme32'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"arrowdragme2", _view.bottom3) // EJsS HtmlView.HtmlView Page: declaration of element 'arrowdragme2'
      .setProperty("MarkEnd","ANGLE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'arrowdragme2'
      .setProperty("LineColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'arrowdragme2'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'arrowdragme2'
      .setProperty("Offset","SOUTH_WEST") // EJsS HtmlView.HtmlView Page: setting property 'Offset' for element 'arrowdragme2'
      ;

    _view._addElement(EJSS_DRAWING2D.segmentSet,"segmentSet2", _view.bottom3) // EJsS HtmlView.HtmlView Page: declaration of element 'segmentSet2'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'segmentSet2'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'segmentSet2'
      ;

    _view._addElement(EJSS_DRAWING2D.textSet,"textSet2", _view.bottom3) // EJsS HtmlView.HtmlView Page: declaration of element 'textSet2'
      .setProperty("FillColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'textSet2'
      .setProperty("RelativePosition","NORTH") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'textSet2'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'textSet2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"xreplacedrag", _view.bottom3) // EJsS HtmlView.HtmlView Page: declaration of element 'xreplacedrag'
      .setProperty("FillColor","rgba(200,200,200,1.0)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'xreplacedrag'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'xreplacedrag'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'xreplacedrag'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'xreplacedrag'
      .setProperty("SizeY",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'xreplacedrag'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'xreplacedrag'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'xreplacedrag'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"jawtopmove", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'jawtopmove'
      .setProperty("FillColor","Yellow") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'jawtopmove'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'jawtopmove'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"xy7top22SVG2", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'xy7top22SVG2'
      .setProperty("PointsY",[0,-1.201,-3.597,-7.362,-11.24,-26,-26,-25.05,-22.65,-15.46,-13.29,-12.84,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'xy7top22SVG2'
      .setProperty("PointsX",[0,-2.948,-5.800,-8.424,-9.679,-9.679,-0,-1.921,-3.5,-3.5,-1.693,0,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'xy7top22SVG2'
      .setProperty("FillColor","Gray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'xy7top22SVG2'
      .setProperty("SizeX",1.5) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'xy7top22SVG2'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'xy7top22SVG2'
      .setProperty("Y",96) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'xy7top22SVG2'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"xy7top22SVG", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'xy7top22SVG'
      .setProperty("PointsY",[0,-1.201,-3.597,-7.362,-11.24,-26,-26,-25.05,-22.65,-15.46,-13.29,-12.84,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'xy7top22SVG'
      .setProperty("PointsX",[0,-2.948,-5.800,-8.424,-9.679,-9.679,-0,-1.921,-3.5,-3.5,-1.693,0,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'xy7top22SVG'
      .setProperty("FillColor","url(#mygrandientgolden)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'xy7top22SVG'
      .setProperty("SizeX",1.5) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'xy7top22SVG'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'xy7top22SVG'
      .setProperty("Y",96) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'xy7top22SVG'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"xy7topsmallpiece2", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'xy7topsmallpiece2'
      .setProperty("PointsY",[0,-0.725,-2.356,-4.892,-17,-17,-15.5,-13.59,-12.87]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'xy7topsmallpiece2'
      .setProperty("PointsX",[0.000,-1.812,-4.530,-6.704,-7.067,-3.5,-3.5,-1.993,0]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'xy7topsmallpiece2'
      .setProperty("FillColor","url(#mygrandient4)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'xy7topsmallpiece2'
      .setProperty("SizeX",1.5) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'xy7topsmallpiece2'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'xy7topsmallpiece2'
      .setProperty("Y",96) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'xy7topsmallpiece2'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"hintmagentamainscale", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'hintmagentamainscale'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"text14cm", _view.hintmagentamainscale) // EJsS HtmlView.HtmlView Page: declaration of element 'text14cm'
      .setProperty("FillColor","Cyan") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'text14cm'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'text14cm'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'text14cm'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"text14mm", _view.hintmagentamainscale) // EJsS HtmlView.HtmlView Page: declaration of element 'text14mm'
      .setProperty("FillColor","Cyan") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'text14mm'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'text14mm'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'text14mm'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"arrow2", _view.hintmagentamainscale) // EJsS HtmlView.HtmlView Page: declaration of element 'arrow2'
      .setProperty("LineColor","Cyan") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'arrow2'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'arrow2'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"hintred", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'hintred'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"arrow", _view.hintred) // EJsS HtmlView.HtmlView Page: declaration of element 'arrow'
      .setProperty("LineColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'arrow'
      .setProperty("Attributes",{ "stroke-dasharray":"8 8 8 8" }) // EJsS HtmlView.HtmlView Page: setting property 'Attributes' for element 'arrow'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'arrow'
      .setProperty("Offset","NORTH_EAST") // EJsS HtmlView.HtmlView Page: setting property 'Offset' for element 'arrow'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"textmm", _view.hintred) // EJsS HtmlView.HtmlView Page: declaration of element 'textmm'
      .setProperty("FillColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'textmm'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'textmm'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'textmm'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"text2cm", _view.hintred) // EJsS HtmlView.HtmlView Page: declaration of element 'text2cm'
      .setProperty("FillColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'text2cm'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'text2cm'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'text2cm'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"bottomObjectGroup", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'bottomObjectGroup'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"bottomDragme", _view.bottomObjectGroup) // EJsS HtmlView.HtmlView Page: declaration of element 'bottomDragme'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'bottomDragme'
      .setProperty("LineColor","White") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'bottomDragme'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'bottomDragme'
      .setProperty("DrawFill",false) // EJsS HtmlView.HtmlView Page: setting property 'DrawFill' for element 'bottomDragme'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'bottomDragme'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"bottomObject2", _view.bottomObjectGroup) // EJsS HtmlView.HtmlView Page: declaration of element 'bottomObject2'
      .setProperty("FillColor","url(#mygrandient)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'bottomObject2'
      .setProperty("Sensitivity",0) // EJsS HtmlView.HtmlView Page: setting property 'Sensitivity' for element 'bottomObject2'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'bottomObject2'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'bottomObject2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"bottomObject", _view.bottomObjectGroup) // EJsS HtmlView.HtmlView Page: declaration of element 'bottomObject'
      .setProperty("FillColor","url(#mygrandient)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'bottomObject'
      .setProperty("Sensitivity",0) // EJsS HtmlView.HtmlView Page: setting property 'Sensitivity' for element 'bottomObject'
      .setProperty("ShapeType","ELLIPSE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'bottomObject'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'bottomObject'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"bottomresize", _view.bottomObjectGroup) // EJsS HtmlView.HtmlView Page: declaration of element 'bottomresize'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'bottomresize'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'bottomresize'
      .setProperty("DrawFill",false) // EJsS HtmlView.HtmlView Page: setting property 'DrawFill' for element 'bottomresize'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'bottomresize'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"arrowdragme", _view.bottomObjectGroup) // EJsS HtmlView.HtmlView Page: declaration of element 'arrowdragme'
      .setProperty("MarkEnd","ANGLE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'arrowdragme'
      .setProperty("LineColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'arrowdragme'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'arrowdragme'
      .setProperty("Offset","SOUTH_WEST") // EJsS HtmlView.HtmlView Page: setting property 'Offset' for element 'arrowdragme'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"dragme3", _view.bottomObjectGroup) // EJsS HtmlView.HtmlView Page: declaration of element 'dragme3'
      .setProperty("Text","drag me") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'dragme3'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'dragme3'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"topObject", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'topObject'
      .setProperty("FillColor","Green") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'topObject'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"topresize", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'topresize'
      .setProperty("FillColor","rgba(0,200,0,1.0)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'topresize'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'topresize'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'topresize'
      .setProperty("DrawFill",false) // EJsS HtmlView.HtmlView Page: setting property 'DrawFill' for element 'topresize'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'topresize'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"tailObject", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'tailObject'
      .setProperty("FillColor","Pink") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'tailObject'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'tailObject'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'tailObject'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"tailresize", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'tailresize'
      .setProperty("FillColor","rgba(175,175,200,1.0)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'tailresize'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'tailresize'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'tailresize'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'tailresize'
      .setProperty("SizeY",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'tailresize'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'tailresize'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"answer3", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'answer3'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"answer", _view.answer3) // EJsS HtmlView.HtmlView Page: declaration of element 'answer'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'answer'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'answer'
      .setProperty("Font","normal normal 30px ") // EJsS HtmlView.HtmlView Page: setting property 'Font' for element 'answer'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'answer'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"xymagnifycentre", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'xymagnifycentre'
      .setProperty("FillColor","rgba(255,255,0,0.0)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'xymagnifycentre'
      .setProperty("Transformation",45) // EJsS HtmlView.HtmlView Page: setting property 'Transformation' for element 'xymagnifycentre'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'xymagnifycentre'
      .setProperty("ShapeType","ELLIPSE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'xymagnifycentre'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'xymagnifycentre'
      .setProperty("SizeY",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'xymagnifycentre'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'xymagnifycentre'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'xymagnifycentre'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"step", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'step'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"arrow22", _view.step) // EJsS HtmlView.HtmlView Page: declaration of element 'arrow22'
      .setProperty("MarkEnd","TRIANGLE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'arrow22'
      .setProperty("SizeX",-20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'arrow22'
      .setProperty("X",-10) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'arrow22'
      .setProperty("SizeY",0) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'arrow22'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'arrow22'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'arrow22'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"arrow3", _view.step) // EJsS HtmlView.HtmlView Page: declaration of element 'arrow3'
      .setProperty("MarkEnd","TRIANGLE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'arrow3'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'arrow3'
      .setProperty("X",10) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'arrow3'
      .setProperty("SizeY",0) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'arrow3'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'arrow3'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'arrow3'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"factor", _view.step) // EJsS HtmlView.HtmlView Page: declaration of element 'factor'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'factor'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'factor'
      .setProperty("LineColor","White") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'factor'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'factor'
      .setProperty("SizeY",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'factor'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'factor'
      .setProperty("DrawFill",false) // EJsS HtmlView.HtmlView Page: setting property 'DrawFill' for element 'factor'
      .setProperty("EnabledPosition","ENABLED_Y") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'factor'
      ;

    _view._addElement(EJSS_INTERFACE.panel,"control", _view.full) // EJsS HtmlView.HtmlView Page: declaration of element 'control'
      ;

    _view._addElement(EJSS_INTERFACE.twoStateButton,"collate", _view.control) // EJsS HtmlView.HtmlView Page: declaration of element 'collate'
      .setProperty("TextOn","☰") // EJsS HtmlView.HtmlView Page: setting property 'TextOn' for element 'collate'
      .setProperty("CSS",{"position": "fixed", "display": "block", "top":"0px","right": "45px"}) // EJsS HtmlView.HtmlView Page: setting property 'CSS' for element 'collate'
      .setProperty("TextOff","◀") // EJsS HtmlView.HtmlView Page: setting property 'TextOff' for element 'collate'
      .setProperty("Font","normal normal 3vw ") // EJsS HtmlView.HtmlView Page: setting property 'Font' for element 'collate'
      ;

    _view._addElement(EJSS_INTERFACE.panel,"inputfield", _view.control) // EJsS HtmlView.HtmlView Page: declaration of element 'inputfield'
      .setProperty("Width","95%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'inputfield'
      .setProperty("CSS",{   "position" : "absolute",   "top" : "0%",    "margin-right":"0px",    "right":"5%" }) // EJsS HtmlView.HtmlView Page: setting property 'CSS' for element 'inputfield'
      ;

    _view._addElement(EJSS_INTERFACE.comboBox,"comboBox", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'comboBox'
      .setProperty("Width","15%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'comboBox'
      .setProperty("Tooltip","select user_defined and drag the mass") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'comboBox'
      ;

    _view._addElement(EJSS_INTERFACE.comboBox,"comboBox2", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'comboBox2'
      .setProperty("Width","20%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'comboBox2'
      .setProperty("Tooltip","select user_defined and drag the mass") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'comboBox2'
      ;

    _view._addElement(EJSS_INTERFACE.comboBox,"comboBox3", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'comboBox3'
      .setProperty("Width","15%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'comboBox3'
      .setProperty("Tooltip","select user_defined and drag the mass") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'comboBox3'
      ;

    _view._addElement(EJSS_INTERFACE.twoStateButton,"playPauseButton", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'playPauseButton'
      .setProperty("Width","10%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'playPauseButton'
      .setProperty("TextOn","►") // EJsS HtmlView.HtmlView Page: setting property 'TextOn' for element 'playPauseButton'
      .setProperty("Tooltip","Play/Pause") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'playPauseButton'
      .setProperty("TextOff","||") // EJsS HtmlView.HtmlView Page: setting property 'TextOff' for element 'playPauseButton'
      .setProperty("Display","inline-block") // EJsS HtmlView.HtmlView Page: setting property 'Display' for element 'playPauseButton'
      ;

    _view._addElement(EJSS_INTERFACE.button,"resetButtonAdsMob", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'resetButtonAdsMob'
      .setProperty("Width","10%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'resetButtonAdsMob'
      .setProperty("Tooltip","Watch an Ads to support the development. Thank you!") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'resetButtonAdsMob'
      .setProperty("Text","🎥👍Ads↻") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'resetButtonAdsMob'
      ;

    _view._addElement(EJSS_INTERFACE.button,"resetButton", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'resetButton'
      .setProperty("Width","10%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'resetButton'
      .setProperty("Text","↻") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'resetButton'
      ;

    _view._addElement(EJSS_INTERFACE.imageAndTextButton,"answer2", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'answer2'
      .setProperty("Width","10%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'answer2'
      .setProperty("Text","?=") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'answer2'
      ;

    _view._addElement(EJSS_INTERFACE.comboBox,"cm", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'cm'
      .setProperty("Tooltip","select user_defined and drag the mass") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'cm'
      ;

    _view._addElement(EJSS_INTERFACE.comboBox,"mm", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'mm'
      .setProperty("Tooltip","select user_defined and drag the mass") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'mm'
      ;

    _view._addElement(EJSS_INTERFACE.textField,"textField2", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'textField2'
      .setProperty("Width","10%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'textField2'
      .setProperty("Tooltip","key in your answer key") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'textField2'
      ;

    _view._addElement(EJSS_INTERFACE.imageAndTextButton,"mm2", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'mm2'
      .setProperty("Tooltip","millimetre") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'mm2'
      .setProperty("Text"," mm ") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'mm2'
      ;

    _view._addElement(EJSS_INTERFACE.imageAndTextButton,"cm2", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'cm2'
      .setProperty("Tooltip","centimetre") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'cm2'
      .setProperty("Text"," cm ") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'cm2'
      ;

    _view._addElement(EJSS_INTERFACE.panel,"text", _view._topFrame) // EJsS HtmlView.HtmlView Page: declaration of element 'text'
      .setProperty("CSS",{   "position" : "absolute",   "top" : "100%",    "margin-left":"0px",    "left":"0%" }) // EJsS HtmlView.HtmlView Page: setting property 'CSS' for element 'text'
        };
  return _view;
}


//--><!]]></script>
  </head>
  <body>
    <div class="lds-ripple" id="exploader"><div></div><div></div></div>    
    <div role="button" id="_topFrame" style="text-align:center"></div>
  
    <script type="text/javascript"><!--//--><![CDATA[//><!--
      var _model;
      var _scorm;
      window.addEventListener('load',
        function () { 
          _model =  new AAPTVernierCaliper("_topFrame","_ejs_library/",null);
          if (typeof _isApp !== "undefined" && _isApp) _model.setRunAlways(true);
          TextResizeDetector.TARGET_ELEMENT_ID = '_topFrame';
          TextResizeDetector.USER_INIT_FUNC = function () {
            var iBase = TextResizeDetector.addEventListener(function(e,args) {
              _model._fontResized(args[0].iBase,args[0].iSize,args[0].iDelta);
              },null);
            _model._fontResized(iBase);
          };
          _model.onload();
        }, false);
      $(document).ready(function(){          
    
        $('body').load("svg#plottingPanel", function() {
            setTimeout(function(){
              $('#comboBox2').on('change', function(){                
                if ($(this).val()=='Depth') {
                    $('path#tailresize').remove();
                }
              })
            }, 1000);
        });
    
          //setTimeout(function() {}, 10);      
          
      });

    //--><!]]></script>
  </body>
</html>
