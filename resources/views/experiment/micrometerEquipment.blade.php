<?xml version="1.0" encoding="utf-8"?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:epub="http://www.idpf.org/2007/ops">
  <head>
 <link href="{{ asset('css/style.css')}}" rel="stylesheet" media="all">
    
    <meta charset="utf-8" />
    <title>Micrometer Model</title>
<script async="true" src="https://www.googletagmanager.com/gtag/js?id=UA-3326007-19"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-3326007-19');
  var testMode = false;
</script>
<script data-ad-client="ca-pub-0121577198857509" async="true" src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>    
<link rel="stylesheet" type="text/css" href="{{ asset('experiments/micrometerscrewguage/_ejs_library/css/ejss.css')}}"></link>
    <link rel="stylesheet"  type="text/css" href="{{ asset('experiments/micrometerscrewguage/')}}" />
    <script src="{{ asset('experiments/micrometerscrewguage/_ejs_library/scripts/common_script.js')}}"></script>
    <script src="{{ asset('experiments/micrometerscrewguage/_ejs_library/scripts/textresizedetector.js')}}"></script>
    <script src="{{ asset('experiments/micrometerscrewguage/_ejs_library/ejsS.v1.min.js')}}"></script>

    
    
    
<script type="text/javascript"><!--//--><![CDATA[//><!--
/* _inputParameters: an object with different values for the model parameters */
var testMode = false;
function Micrometer02(_topFrame,_libraryPath,_codebasePath, _inputParameters) {
  var _model = EJSS_CORE.createAnimationLMS();
  var _view;
  var _isPlaying = false;
  var _isPaused = true;
  var _isMobile = (navigator===undefined) ? false : navigator.userAgent.match(/iPhone|iPad|iPod|Android|BlackBerry|Opera Mini|IEMobile/i);

var _stringProperties = {};
  var _tools = {
    showInputDialog : EJSS_INTERFACE.BoxPanel.showInputDialog,
    showOkDialog : EJSS_INTERFACE.BoxPanel.showOkDialog,
    showOkCancelDialog : EJSS_INTERFACE.BoxPanel.showOkCancelDialog,
    downloadText: EJSS_TOOLS.File.downloadText,
    uploadText: function(action) { EJSS_TOOLS.File.uploadText(_model,action); } 
  };

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

  var inputdropmenu; // EjsS Model.Variables.coordinate.inputdropmenu
  var font; // EjsS Model.Variables.coordinate.font
  var mode; // EjsS Model.Variables.coordinate.mode
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
  var zero; // EjsS Model.Variables.coordinate.zero
  var pi; // EjsS Model.Variables.coordinate.pi
  var show; // EjsS Model.Variables.coordinate.show
  var show2; // EjsS Model.Variables.coordinate.show2
  var mx; // EjsS Model.Variables.coordinate.mx
  var my; // EjsS Model.Variables.coordinate.my
  var mxs; // EjsS Model.Variables.coordinate.mxs
  var mys; // EjsS Model.Variables.coordinate.mys
  var zoom; // EjsS Model.Variables.coordinate.zoom
  var autoscale; // EjsS Model.Variables.coordinate.autoscale

  var y; // EjsS Model.Variables.basic.y
  var n; // EjsS Model.Variables.basic.n
  var n2; // EjsS Model.Variables.basic.n2
  var xv; // EjsS Model.Variables.basic.xv
  var yv; // EjsS Model.Variables.basic.yv
  var xi; // EjsS Model.Variables.basic.xi
  var dx; // EjsS Model.Variables.basic.dx
  var tx; // EjsS Model.Variables.basic.tx
  var txt; // EjsS Model.Variables.basic.txt
  var n3; // EjsS Model.Variables.basic.n3
  var hy; // EjsS Model.Variables.basic.hy
  var hdx; // EjsS Model.Variables.basic.hdx
  var hdy; // EjsS Model.Variables.basic.hdy
  var hdxthread; // EjsS Model.Variables.basic.hdxthread
  var hythread; // EjsS Model.Variables.basic.hythread
  var hythreadrachet; // EjsS Model.Variables.basic.hythreadrachet

  var np; // EjsS Model.Variables.greendial.np
  var h; // EjsS Model.Variables.greendial.h
  var h2; // EjsS Model.Variables.greendial.h2
  var xp; // EjsS Model.Variables.greendial.xp
  var yp; // EjsS Model.Variables.greendial.yp
  var xpolygon; // EjsS Model.Variables.greendial.xpolygon
  var xpolygondrag; // EjsS Model.Variables.greendial.xpolygondrag
  var test; // EjsS Model.Variables.greendial.test
  var alerttext; // EjsS Model.Variables.greendial.alerttext
  var firsttime; // EjsS Model.Variables.greendial.firsttime
  var firsttime2; // EjsS Model.Variables.greendial.firsttime2

  var npr; // EjsS Model.Variables.rachet.npr
  var xpr; // EjsS Model.Variables.rachet.xpr
  var ypr; // EjsS Model.Variables.rachet.ypr
  var direction; // EjsS Model.Variables.rachet.direction
  var step0; // EjsS Model.Variables.rachet.step0
  var step; // EjsS Model.Variables.rachet.step

  var objectpositionx; // EjsS Model.Variables.view.objectpositionx
  var objectpositiony; // EjsS Model.Variables.view.objectpositiony
  var w; // EjsS Model.Variables.view.w
  var L0; // EjsS Model.Variables.view.L0
  var w2; // EjsS Model.Variables.view.w2
  var d; // EjsS Model.Variables.view.d
  var ds; // EjsS Model.Variables.view.ds
  var Lmax; // EjsS Model.Variables.view.Lmax
  var L; // EjsS Model.Variables.view.L
  var dmin; // EjsS Model.Variables.view.dmin
  var x1; // EjsS Model.Variables.view.x1
  var xzero; // EjsS Model.Variables.view.xzero
  var id; // EjsS Model.Variables.view.id
  var iy; // EjsS Model.Variables.view.iy
  var dy; // EjsS Model.Variables.view.dy
  var ci; // EjsS Model.Variables.view.ci
  var dc; // EjsS Model.Variables.view.dc
  var c; // EjsS Model.Variables.view.c
  var R; // EjsS Model.Variables.view.R
  var yt; // EjsS Model.Variables.view.yt
  var txty; // EjsS Model.Variables.view.txty
  var tc; // EjsS Model.Variables.view.tc
  var error; // EjsS Model.Variables.view.error

  var l_msg; // EjsS Model.Variables.text.l_msg
  var idv; // EjsS Model.Variables.text.idv
  var l_msg_2; // EjsS Model.Variables.text.l_msg_2
  var integerd; // EjsS Model.Variables.text.integerd
  var decimald; // EjsS Model.Variables.text.decimald
  var integerd1; // EjsS Model.Variables.text.integerd1
  var decimald1; // EjsS Model.Variables.text.decimald1
  var integerd2; // EjsS Model.Variables.text.integerd2
  var decimald2; // EjsS Model.Variables.text.decimald2
  var l_integerd; // EjsS Model.Variables.text.l_integerd
  var l_decimald; // EjsS Model.Variables.text.l_decimald
  var showhint; // EjsS Model.Variables.text.showhint

  var nolock; // EjsS Model.Variables.lock.nolock
  var lock; // EjsS Model.Variables.lock.lock

  var showAnswerFlag; // EjsS Model.Variables.check.showAnswerFlag
  var answer; // EjsS Model.Variables.check.answer
  var l_answer; // EjsS Model.Variables.check.l_answer
  var l_enterK1f; // EjsS Model.Variables.check.l_enterK1f
  var enterK1f; // EjsS Model.Variables.check.enterK1f
  var K1fcorrect; // EjsS Model.Variables.check.K1fcorrect
  var K1fcorrectbackground; // EjsS Model.Variables.check.K1fcorrectbackground

  var showmagnify; // EjsS Model.Variables.magnify.showmagnify
  var xmagnify; // EjsS Model.Variables.magnify.xmagnify
  var ymagnify; // EjsS Model.Variables.magnify.ymagnify
  var factor; // EjsS Model.Variables.magnify.factor
  var wmagnify; // EjsS Model.Variables.magnify.wmagnify
  var ratio; // EjsS Model.Variables.magnify.ratio

  var text; // EjsS Model.Variables.lookang.text
  var selected; // EjsS Model.Variables.lookang.selected
  var ddragme; // EjsS Model.Variables.lookang.ddragme
  var bottomdragmesize; // EjsS Model.Variables.lookang.bottomdragmesize
  var iOSapp; // EjsS Model.Variables.lookang.iOSapp
  var Androidapp; // EjsS Model.Variables.lookang.Androidapp
  var anyapp; // EjsS Model.Variables.lookang.anyapp
  var isAndroid; // EjsS Model.Variables.lookang.isAndroid
  var iOS; // EjsS Model.Variables.lookang.iOS
  var Android; // EjsS Model.Variables.lookang.Android
  var iPad; // EjsS Model.Variables.lookang.iPad
  var iPhone; // EjsS Model.Variables.lookang.iPhone
  var dragmex; // EjsS Model.Variables.lookang.dragmex
  var dragmexs; // EjsS Model.Variables.lookang.dragmexs
  var dragmey; // EjsS Model.Variables.lookang.dragmey
  var dragemetrue; // EjsS Model.Variables.lookang.dragemetrue
  var dragemetrue2; // EjsS Model.Variables.lookang.dragemetrue2
  var tdrag; // EjsS Model.Variables.lookang.tdrag
  var Width; // EjsS Model.Variables.lookang.Width
  var Height; // EjsS Model.Variables.lookang.Height
  var Width1; // EjsS Model.Variables.lookang.Width1
  var Width2; // EjsS Model.Variables.lookang.Width2
  var vvst; // EjsS Model.Variables.lookang.vvst
  var disabledworld; // EjsS Model.Variables.lookang.disabledworld
  var disabled; // EjsS Model.Variables.lookang.disabled
  var KEvstime; // EjsS Model.Variables.lookang.KEvstime
  var world; // EjsS Model.Variables.lookang.world
  var xmodel; // EjsS Model.Variables.lookang.xmodel
  var showmodel; // EjsS Model.Variables.lookang.showmodel
  var functionY; // EjsS Model.Variables.lookang.functionY
  var solutionY; // EjsS Model.Variables.lookang.solutionY

  _model.getOdes = function() { return []; };

  _model.removeEvents = function(){
  };

  function _serialize() { return _model.serialize(); }

  _model._userSerialize = function() {
    return {
      inputdropmenu : inputdropmenu,
      font : font,
      mode : mode,
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
      zero : zero,
      pi : pi,
      show : show,
      show2 : show2,
      mx : mx,
      my : my,
      mxs : mxs,
      mys : mys,
      zoom : zoom,
      autoscale : autoscale,
      y : y,
      n : n,
      n2 : n2,
      xv : xv,
      yv : yv,
      xi : xi,
      dx : dx,
      tx : tx,
      txt : txt,
      n3 : n3,
      hy : hy,
      hdx : hdx,
      hdy : hdy,
      hdxthread : hdxthread,
      hythread : hythread,
      hythreadrachet : hythreadrachet,
      np : np,
      h : h,
      h2 : h2,
      xp : xp,
      yp : yp,
      xpolygon : xpolygon,
      xpolygondrag : xpolygondrag,
      test : test,
      alerttext : alerttext,
      firsttime : firsttime,
      firsttime2 : firsttime2,
      npr : npr,
      xpr : xpr,
      ypr : ypr,
      direction : direction,
      step0 : step0,
      step : step,
      objectpositionx : objectpositionx,
      objectpositiony : objectpositiony,
      w : w,
      L0 : L0,
      w2 : w2,
      d : d,
      ds : ds,
      Lmax : Lmax,
      L : L,
      dmin : dmin,
      x1 : x1,
      xzero : xzero,
      id : id,
      iy : iy,
      dy : dy,
      ci : ci,
      dc : dc,
      c : c,
      R : R,
      yt : yt,
      txty : txty,
      tc : tc,
      error : error,
      l_msg : l_msg,
      idv : idv,
      l_msg_2 : l_msg_2,
      integerd : integerd,
      decimald : decimald,
      integerd1 : integerd1,
      decimald1 : decimald1,
      integerd2 : integerd2,
      decimald2 : decimald2,
      l_integerd : l_integerd,
      l_decimald : l_decimald,
      showhint : showhint,
      nolock : nolock,
      lock : lock,
      showAnswerFlag : showAnswerFlag,
      answer : answer,
      l_answer : l_answer,
      l_enterK1f : l_enterK1f,
      enterK1f : enterK1f,
      K1fcorrect : K1fcorrect,
      K1fcorrectbackground : K1fcorrectbackground,
      showmagnify : showmagnify,
      xmagnify : xmagnify,
      ymagnify : ymagnify,
      factor : factor,
      wmagnify : wmagnify,
      ratio : ratio,
      text : text,
      selected : selected,
      ddragme : ddragme,
      bottomdragmesize : bottomdragmesize,
      iOSapp : iOSapp,
      Androidapp : Androidapp,
      anyapp : anyapp,
      isAndroid : isAndroid,
      iOS : iOS,
      Android : Android,
      iPad : iPad,
      iPhone : iPhone,
      dragmex : dragmex,
      dragmexs : dragmexs,
      dragmey : dragmey,
      dragemetrue : dragemetrue,
      dragemetrue2 : dragemetrue2,
      tdrag : tdrag,
      Width : Width,
      Height : Height,
      Width1 : Width1,
      Width2 : Width2,
      vvst : vvst,
      disabledworld : disabledworld,
      disabled : disabled,
      KEvstime : KEvstime,
      world : world,
      xmodel : xmodel,
      showmodel : showmodel,
      functionY : functionY,
      solutionY : solutionY
    };
  };

  function _serializePublic() { return _model.serializePublic(); }

  _model._userSerializePublic = function() {
    return {
      inputdropmenu : inputdropmenu,
      font : font,
      mode : mode,
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
      zero : zero,
      pi : pi,
      show : show,
      show2 : show2,
      mx : mx,
      my : my,
      mxs : mxs,
      mys : mys,
      zoom : zoom,
      autoscale : autoscale,
      y : y,
      n : n,
      n2 : n2,
      xv : xv,
      yv : yv,
      xi : xi,
      dx : dx,
      tx : tx,
      txt : txt,
      n3 : n3,
      hy : hy,
      hdx : hdx,
      hdy : hdy,
      hdxthread : hdxthread,
      hythread : hythread,
      hythreadrachet : hythreadrachet,
      np : np,
      h : h,
      h2 : h2,
      xp : xp,
      yp : yp,
      xpolygon : xpolygon,
      xpolygondrag : xpolygondrag,
      test : test,
      alerttext : alerttext,
      firsttime : firsttime,
      firsttime2 : firsttime2,
      npr : npr,
      xpr : xpr,
      ypr : ypr,
      direction : direction,
      step0 : step0,
      step : step,
      objectpositionx : objectpositionx,
      objectpositiony : objectpositiony,
      w : w,
      L0 : L0,
      w2 : w2,
      d : d,
      ds : ds,
      Lmax : Lmax,
      L : L,
      dmin : dmin,
      x1 : x1,
      xzero : xzero,
      id : id,
      iy : iy,
      dy : dy,
      ci : ci,
      dc : dc,
      c : c,
      R : R,
      yt : yt,
      txty : txty,
      tc : tc,
      error : error,
      l_msg : l_msg,
      idv : idv,
      l_msg_2 : l_msg_2,
      integerd : integerd,
      decimald : decimald,
      integerd1 : integerd1,
      decimald1 : decimald1,
      integerd2 : integerd2,
      decimald2 : decimald2,
      l_integerd : l_integerd,
      l_decimald : l_decimald,
      showhint : showhint,
      nolock : nolock,
      lock : lock,
      showAnswerFlag : showAnswerFlag,
      answer : answer,
      l_answer : l_answer,
      l_enterK1f : l_enterK1f,
      enterK1f : enterK1f,
      K1fcorrect : K1fcorrect,
      K1fcorrectbackground : K1fcorrectbackground,
      showmagnify : showmagnify,
      xmagnify : xmagnify,
      ymagnify : ymagnify,
      factor : factor,
      wmagnify : wmagnify,
      ratio : ratio,
      text : text,
      selected : selected,
      ddragme : ddragme,
      bottomdragmesize : bottomdragmesize,
      iOSapp : iOSapp,
      Androidapp : Androidapp,
      anyapp : anyapp,
      isAndroid : isAndroid,
      iOS : iOS,
      Android : Android,
      iPad : iPad,
      iPhone : iPhone,
      dragmex : dragmex,
      dragmexs : dragmexs,
      dragmey : dragmey,
      dragemetrue : dragemetrue,
      dragemetrue2 : dragemetrue2,
      tdrag : tdrag,
      Width : Width,
      Height : Height,
      Width1 : Width1,
      Width2 : Width2,
      vvst : vvst,
      disabledworld : disabledworld,
      disabled : disabled,
      KEvstime : KEvstime,
      world : world,
      xmodel : xmodel,
      showmodel : showmodel,
      functionY : functionY,
      solutionY : solutionY
    };
  };

  _model._readParameters = function(json) {
    if(typeof json.inputdropmenu != "undefined") inputdropmenu = json.inputdropmenu;
    if(typeof json.font != "undefined") font = json.font;
    if(typeof json.mode != "undefined") mode = json.mode;
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
    if(typeof json.zero != "undefined") zero = json.zero;
    if(typeof json.pi != "undefined") pi = json.pi;
    if(typeof json.show != "undefined") show = json.show;
    if(typeof json.show2 != "undefined") show2 = json.show2;
    if(typeof json.mx != "undefined") mx = json.mx;
    if(typeof json.my != "undefined") my = json.my;
    if(typeof json.mxs != "undefined") mxs = json.mxs;
    if(typeof json.mys != "undefined") mys = json.mys;
    if(typeof json.zoom != "undefined") zoom = json.zoom;
    if(typeof json.autoscale != "undefined") autoscale = json.autoscale;
    if(typeof json.y != "undefined") y = json.y;
    if(typeof json.n != "undefined") n = json.n;
    if(typeof json.n2 != "undefined") n2 = json.n2;
    if(typeof json.xv != "undefined") xv = json.xv;
    if(typeof json.yv != "undefined") yv = json.yv;
    if(typeof json.xi != "undefined") xi = json.xi;
    if(typeof json.dx != "undefined") dx = json.dx;
    if(typeof json.tx != "undefined") tx = json.tx;
    if(typeof json.txt != "undefined") txt = json.txt;
    if(typeof json.n3 != "undefined") n3 = json.n3;
    if(typeof json.hy != "undefined") hy = json.hy;
    if(typeof json.hdx != "undefined") hdx = json.hdx;
    if(typeof json.hdy != "undefined") hdy = json.hdy;
    if(typeof json.hdxthread != "undefined") hdxthread = json.hdxthread;
    if(typeof json.hythread != "undefined") hythread = json.hythread;
    if(typeof json.hythreadrachet != "undefined") hythreadrachet = json.hythreadrachet;
    if(typeof json.np != "undefined") np = json.np;
    if(typeof json.h != "undefined") h = json.h;
    if(typeof json.h2 != "undefined") h2 = json.h2;
    if(typeof json.xp != "undefined") xp = json.xp;
    if(typeof json.yp != "undefined") yp = json.yp;
    if(typeof json.xpolygon != "undefined") xpolygon = json.xpolygon;
    if(typeof json.xpolygondrag != "undefined") xpolygondrag = json.xpolygondrag;
    if(typeof json.test != "undefined") test = json.test;
    if(typeof json.alerttext != "undefined") alerttext = json.alerttext;
    if(typeof json.firsttime != "undefined") firsttime = json.firsttime;
    if(typeof json.firsttime2 != "undefined") firsttime2 = json.firsttime2;
    if(typeof json.npr != "undefined") npr = json.npr;
    if(typeof json.xpr != "undefined") xpr = json.xpr;
    if(typeof json.ypr != "undefined") ypr = json.ypr;
    if(typeof json.direction != "undefined") direction = json.direction;
    if(typeof json.step0 != "undefined") step0 = json.step0;
    if(typeof json.step != "undefined") step = json.step;
    if(typeof json.objectpositionx != "undefined") objectpositionx = json.objectpositionx;
    if(typeof json.objectpositiony != "undefined") objectpositiony = json.objectpositiony;
    if(typeof json.w != "undefined") w = json.w;
    if(typeof json.L0 != "undefined") L0 = json.L0;
    if(typeof json.w2 != "undefined") w2 = json.w2;
    if(typeof json.d != "undefined") d = json.d;
    if(typeof json.ds != "undefined") ds = json.ds;
    if(typeof json.Lmax != "undefined") Lmax = json.Lmax;
    if(typeof json.L != "undefined") L = json.L;
    if(typeof json.dmin != "undefined") dmin = json.dmin;
    if(typeof json.x1 != "undefined") x1 = json.x1;
    if(typeof json.xzero != "undefined") xzero = json.xzero;
    if(typeof json.id != "undefined") id = json.id;
    if(typeof json.iy != "undefined") iy = json.iy;
    if(typeof json.dy != "undefined") dy = json.dy;
    if(typeof json.ci != "undefined") ci = json.ci;
    if(typeof json.dc != "undefined") dc = json.dc;
    if(typeof json.c != "undefined") c = json.c;
    if(typeof json.R != "undefined") R = json.R;
    if(typeof json.yt != "undefined") yt = json.yt;
    if(typeof json.txty != "undefined") txty = json.txty;
    if(typeof json.tc != "undefined") tc = json.tc;
    if(typeof json.error != "undefined") error = json.error;
    if(typeof json.l_msg != "undefined") l_msg = json.l_msg;
    if(typeof json.idv != "undefined") idv = json.idv;
    if(typeof json.l_msg_2 != "undefined") l_msg_2 = json.l_msg_2;
    if(typeof json.integerd != "undefined") integerd = json.integerd;
    if(typeof json.decimald != "undefined") decimald = json.decimald;
    if(typeof json.integerd1 != "undefined") integerd1 = json.integerd1;
    if(typeof json.decimald1 != "undefined") decimald1 = json.decimald1;
    if(typeof json.integerd2 != "undefined") integerd2 = json.integerd2;
    if(typeof json.decimald2 != "undefined") decimald2 = json.decimald2;
    if(typeof json.l_integerd != "undefined") l_integerd = json.l_integerd;
    if(typeof json.l_decimald != "undefined") l_decimald = json.l_decimald;
    if(typeof json.showhint != "undefined") showhint = json.showhint;
    if(typeof json.nolock != "undefined") nolock = json.nolock;
    if(typeof json.lock != "undefined") lock = json.lock;
    if(typeof json.showAnswerFlag != "undefined") showAnswerFlag = json.showAnswerFlag;
    if(typeof json.answer != "undefined") answer = json.answer;
    if(typeof json.l_answer != "undefined") l_answer = json.l_answer;
    if(typeof json.l_enterK1f != "undefined") l_enterK1f = json.l_enterK1f;
    if(typeof json.enterK1f != "undefined") enterK1f = json.enterK1f;
    if(typeof json.K1fcorrect != "undefined") K1fcorrect = json.K1fcorrect;
    if(typeof json.K1fcorrectbackground != "undefined") K1fcorrectbackground = json.K1fcorrectbackground;
    if(typeof json.showmagnify != "undefined") showmagnify = json.showmagnify;
    if(typeof json.xmagnify != "undefined") xmagnify = json.xmagnify;
    if(typeof json.ymagnify != "undefined") ymagnify = json.ymagnify;
    if(typeof json.factor != "undefined") factor = json.factor;
    if(typeof json.wmagnify != "undefined") wmagnify = json.wmagnify;
    if(typeof json.ratio != "undefined") ratio = json.ratio;
    if(typeof json.text != "undefined") text = json.text;
    if(typeof json.selected != "undefined") selected = json.selected;
    if(typeof json.ddragme != "undefined") ddragme = json.ddragme;
    if(typeof json.bottomdragmesize != "undefined") bottomdragmesize = json.bottomdragmesize;
    if(typeof json.iOSapp != "undefined") iOSapp = json.iOSapp;
    if(typeof json.Androidapp != "undefined") Androidapp = json.Androidapp;
    if(typeof json.anyapp != "undefined") anyapp = json.anyapp;
    if(typeof json.isAndroid != "undefined") isAndroid = json.isAndroid;
    if(typeof json.iOS != "undefined") iOS = json.iOS;
    if(typeof json.Android != "undefined") Android = json.Android;
    if(typeof json.iPad != "undefined") iPad = json.iPad;
    if(typeof json.iPhone != "undefined") iPhone = json.iPhone;
    if(typeof json.dragmex != "undefined") dragmex = json.dragmex;
    if(typeof json.dragmexs != "undefined") dragmexs = json.dragmexs;
    if(typeof json.dragmey != "undefined") dragmey = json.dragmey;
    if(typeof json.dragemetrue != "undefined") dragemetrue = json.dragemetrue;
    if(typeof json.dragemetrue2 != "undefined") dragemetrue2 = json.dragemetrue2;
    if(typeof json.tdrag != "undefined") tdrag = json.tdrag;
    if(typeof json.Width != "undefined") Width = json.Width;
    if(typeof json.Height != "undefined") Height = json.Height;
    if(typeof json.Width1 != "undefined") Width1 = json.Width1;
    if(typeof json.Width2 != "undefined") Width2 = json.Width2;
    if(typeof json.vvst != "undefined") vvst = json.vvst;
    if(typeof json.disabledworld != "undefined") disabledworld = json.disabledworld;
    if(typeof json.disabled != "undefined") disabled = json.disabled;
    if(typeof json.KEvstime != "undefined") KEvstime = json.KEvstime;
    if(typeof json.world != "undefined") world = json.world;
    if(typeof json.xmodel != "undefined") xmodel = json.xmodel;
    if(typeof json.showmodel != "undefined") showmodel = json.showmodel;
    if(typeof json.functionY != "undefined") functionY = json.functionY;
    if(typeof json.solutionY != "undefined") solutionY = json.solutionY;
  };

  _model._readParametersPublic = function(json) {
    if(typeof json.inputdropmenu != "undefined") inputdropmenu = json.inputdropmenu;
    if(typeof json.font != "undefined") font = json.font;
    if(typeof json.mode != "undefined") mode = json.mode;
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
    if(typeof json.zero != "undefined") zero = json.zero;
    if(typeof json.pi != "undefined") pi = json.pi;
    if(typeof json.show != "undefined") show = json.show;
    if(typeof json.show2 != "undefined") show2 = json.show2;
    if(typeof json.mx != "undefined") mx = json.mx;
    if(typeof json.my != "undefined") my = json.my;
    if(typeof json.mxs != "undefined") mxs = json.mxs;
    if(typeof json.mys != "undefined") mys = json.mys;
    if(typeof json.zoom != "undefined") zoom = json.zoom;
    if(typeof json.autoscale != "undefined") autoscale = json.autoscale;
    if(typeof json.y != "undefined") y = json.y;
    if(typeof json.n != "undefined") n = json.n;
    if(typeof json.n2 != "undefined") n2 = json.n2;
    if(typeof json.xv != "undefined") xv = json.xv;
    if(typeof json.yv != "undefined") yv = json.yv;
    if(typeof json.xi != "undefined") xi = json.xi;
    if(typeof json.dx != "undefined") dx = json.dx;
    if(typeof json.tx != "undefined") tx = json.tx;
    if(typeof json.txt != "undefined") txt = json.txt;
    if(typeof json.n3 != "undefined") n3 = json.n3;
    if(typeof json.hy != "undefined") hy = json.hy;
    if(typeof json.hdx != "undefined") hdx = json.hdx;
    if(typeof json.hdy != "undefined") hdy = json.hdy;
    if(typeof json.hdxthread != "undefined") hdxthread = json.hdxthread;
    if(typeof json.hythread != "undefined") hythread = json.hythread;
    if(typeof json.hythreadrachet != "undefined") hythreadrachet = json.hythreadrachet;
    if(typeof json.np != "undefined") np = json.np;
    if(typeof json.h != "undefined") h = json.h;
    if(typeof json.h2 != "undefined") h2 = json.h2;
    if(typeof json.xp != "undefined") xp = json.xp;
    if(typeof json.yp != "undefined") yp = json.yp;
    if(typeof json.xpolygon != "undefined") xpolygon = json.xpolygon;
    if(typeof json.xpolygondrag != "undefined") xpolygondrag = json.xpolygondrag;
    if(typeof json.test != "undefined") test = json.test;
    if(typeof json.alerttext != "undefined") alerttext = json.alerttext;
    if(typeof json.firsttime != "undefined") firsttime = json.firsttime;
    if(typeof json.firsttime2 != "undefined") firsttime2 = json.firsttime2;
    if(typeof json.npr != "undefined") npr = json.npr;
    if(typeof json.xpr != "undefined") xpr = json.xpr;
    if(typeof json.ypr != "undefined") ypr = json.ypr;
    if(typeof json.direction != "undefined") direction = json.direction;
    if(typeof json.step0 != "undefined") step0 = json.step0;
    if(typeof json.step != "undefined") step = json.step;
    if(typeof json.objectpositionx != "undefined") objectpositionx = json.objectpositionx;
    if(typeof json.objectpositiony != "undefined") objectpositiony = json.objectpositiony;
    if(typeof json.w != "undefined") w = json.w;
    if(typeof json.L0 != "undefined") L0 = json.L0;
    if(typeof json.w2 != "undefined") w2 = json.w2;
    if(typeof json.d != "undefined") d = json.d;
    if(typeof json.ds != "undefined") ds = json.ds;
    if(typeof json.Lmax != "undefined") Lmax = json.Lmax;
    if(typeof json.L != "undefined") L = json.L;
    if(typeof json.dmin != "undefined") dmin = json.dmin;
    if(typeof json.x1 != "undefined") x1 = json.x1;
    if(typeof json.xzero != "undefined") xzero = json.xzero;
    if(typeof json.id != "undefined") id = json.id;
    if(typeof json.iy != "undefined") iy = json.iy;
    if(typeof json.dy != "undefined") dy = json.dy;
    if(typeof json.ci != "undefined") ci = json.ci;
    if(typeof json.dc != "undefined") dc = json.dc;
    if(typeof json.c != "undefined") c = json.c;
    if(typeof json.R != "undefined") R = json.R;
    if(typeof json.yt != "undefined") yt = json.yt;
    if(typeof json.txty != "undefined") txty = json.txty;
    if(typeof json.tc != "undefined") tc = json.tc;
    if(typeof json.error != "undefined") error = json.error;
    if(typeof json.l_msg != "undefined") l_msg = json.l_msg;
    if(typeof json.idv != "undefined") idv = json.idv;
    if(typeof json.l_msg_2 != "undefined") l_msg_2 = json.l_msg_2;
    if(typeof json.integerd != "undefined") integerd = json.integerd;
    if(typeof json.decimald != "undefined") decimald = json.decimald;
    if(typeof json.integerd1 != "undefined") integerd1 = json.integerd1;
    if(typeof json.decimald1 != "undefined") decimald1 = json.decimald1;
    if(typeof json.integerd2 != "undefined") integerd2 = json.integerd2;
    if(typeof json.decimald2 != "undefined") decimald2 = json.decimald2;
    if(typeof json.l_integerd != "undefined") l_integerd = json.l_integerd;
    if(typeof json.l_decimald != "undefined") l_decimald = json.l_decimald;
    if(typeof json.showhint != "undefined") showhint = json.showhint;
    if(typeof json.nolock != "undefined") nolock = json.nolock;
    if(typeof json.lock != "undefined") lock = json.lock;
    if(typeof json.showAnswerFlag != "undefined") showAnswerFlag = json.showAnswerFlag;
    if(typeof json.answer != "undefined") answer = json.answer;
    if(typeof json.l_answer != "undefined") l_answer = json.l_answer;
    if(typeof json.l_enterK1f != "undefined") l_enterK1f = json.l_enterK1f;
    if(typeof json.enterK1f != "undefined") enterK1f = json.enterK1f;
    if(typeof json.K1fcorrect != "undefined") K1fcorrect = json.K1fcorrect;
    if(typeof json.K1fcorrectbackground != "undefined") K1fcorrectbackground = json.K1fcorrectbackground;
    if(typeof json.showmagnify != "undefined") showmagnify = json.showmagnify;
    if(typeof json.xmagnify != "undefined") xmagnify = json.xmagnify;
    if(typeof json.ymagnify != "undefined") ymagnify = json.ymagnify;
    if(typeof json.factor != "undefined") factor = json.factor;
    if(typeof json.wmagnify != "undefined") wmagnify = json.wmagnify;
    if(typeof json.ratio != "undefined") ratio = json.ratio;
    if(typeof json.text != "undefined") text = json.text;
    if(typeof json.selected != "undefined") selected = json.selected;
    if(typeof json.ddragme != "undefined") ddragme = json.ddragme;
    if(typeof json.bottomdragmesize != "undefined") bottomdragmesize = json.bottomdragmesize;
    if(typeof json.iOSapp != "undefined") iOSapp = json.iOSapp;
    if(typeof json.Androidapp != "undefined") Androidapp = json.Androidapp;
    if(typeof json.anyapp != "undefined") anyapp = json.anyapp;
    if(typeof json.isAndroid != "undefined") isAndroid = json.isAndroid;
    if(typeof json.iOS != "undefined") iOS = json.iOS;
    if(typeof json.Android != "undefined") Android = json.Android;
    if(typeof json.iPad != "undefined") iPad = json.iPad;
    if(typeof json.iPhone != "undefined") iPhone = json.iPhone;
    if(typeof json.dragmex != "undefined") dragmex = json.dragmex;
    if(typeof json.dragmexs != "undefined") dragmexs = json.dragmexs;
    if(typeof json.dragmey != "undefined") dragmey = json.dragmey;
    if(typeof json.dragemetrue != "undefined") dragemetrue = json.dragemetrue;
    if(typeof json.dragemetrue2 != "undefined") dragemetrue2 = json.dragemetrue2;
    if(typeof json.tdrag != "undefined") tdrag = json.tdrag;
    if(typeof json.Width != "undefined") Width = json.Width;
    if(typeof json.Height != "undefined") Height = json.Height;
    if(typeof json.Width1 != "undefined") Width1 = json.Width1;
    if(typeof json.Width2 != "undefined") Width2 = json.Width2;
    if(typeof json.vvst != "undefined") vvst = json.vvst;
    if(typeof json.disabledworld != "undefined") disabledworld = json.disabledworld;
    if(typeof json.disabled != "undefined") disabled = json.disabled;
    if(typeof json.KEvstime != "undefined") KEvstime = json.KEvstime;
    if(typeof json.world != "undefined") world = json.world;
    if(typeof json.xmodel != "undefined") xmodel = json.xmodel;
    if(typeof json.showmodel != "undefined") showmodel = json.showmodel;
    if(typeof json.functionY != "undefined") functionY = json.functionY;
    if(typeof json.solutionY != "undefined") solutionY = json.solutionY;
  };

  function _unserializePublic(json) { return _model.unserializePublic(json); }

  _model._userUnserializePublic = function(json) {
    _model._readParametersPublic(json);
   _resetSolvers();
   _model.update();
  };

  function _unserialize(json) { return _model.unserialize(json); }

  _model._userUnserialize = function(json) {
    _model._readParameters(json);
   _resetSolvers();
   _model.update();
  };

  _model.addToReset(function() {
    __pagesEnabled["Init Page"] = true;
    __pagesEnabled["message"] = true;
    __pagesEnabled["undefined"] = true;
    __pagesEnabled["radial"] = true;
    __pagesEnabled["alert"] = true;
    __pagesEnabled["Evol Page"] = true;
    __pagesEnabled["FixRel Page 2"] = true;
    __pagesEnabled["hintnew"] = true;
    __pagesEnabled["showanswer"] = true;
    __pagesEnabled["check"] = true;
    __pagesEnabled["preventgoing over"] = true;
  });

  _model.addToReset(function() {
    inputdropmenu = true; // EjsS Model.Variables.coordinate.inputdropmenu
    font = "normal normal 3vw "; // EjsS Model.Variables.coordinate.font
    mode = new Array(1); // EjsS Model.Variables.coordinate.mode
    (function () {
      var _i0;
      for (_i0=0; _i0<1; _i0+=1) {  // EjsS Model.Variables.coordinate.mode
        mode[_i0] = "hint off";  // EjsS Model.Variables.coordinate.mode
      }
    }());
    range = 200; // EjsS Model.Variables.coordinate.range
    xmin = -range/2*2.3; // EjsS Model.Variables.coordinate.xmin
    xmax = range/2*1.7; // EjsS Model.Variables.coordinate.xmax
    ymin = -range/2*1.7; // EjsS Model.Variables.coordinate.ymin
    ymax = range/2; // EjsS Model.Variables.coordinate.ymax
    t = 0.0; // EjsS Model.Variables.coordinate.t
    dt = 0.05; // EjsS Model.Variables.coordinate.dt
    size = range/20; // EjsS Model.Variables.coordinate.size
    size2 = size/2; // EjsS Model.Variables.coordinate.size2
    stroke = 2.0; // EjsS Model.Variables.coordinate.stroke
    zero = 0.0; // EjsS Model.Variables.coordinate.zero
    pi = Math.PI; // EjsS Model.Variables.coordinate.pi
    mx = 25; // EjsS Model.Variables.coordinate.mx
    my = 0; // EjsS Model.Variables.coordinate.my
    mxs = 0; // EjsS Model.Variables.coordinate.mxs
    mys = 0; // EjsS Model.Variables.coordinate.mys
    zoom = 1; // EjsS Model.Variables.coordinate.zoom
    autoscale = true; // EjsS Model.Variables.coordinate.autoscale
  });

  _model.addToReset(function() {
    y = -size; // EjsS Model.Variables.basic.y
    n = 35; // EjsS Model.Variables.basic.n
    n2 = n/5; // EjsS Model.Variables.basic.n2
    xv = new Array(n); // EjsS Model.Variables.basic.xv
    (function () {
      var _i0;
      for (_i0=0; _i0<n; _i0+=1) {  // EjsS Model.Variables.basic.xv
        xv[_i0] = 0.0;  // EjsS Model.Variables.basic.xv
      }
    }());
    yv = new Array(n); // EjsS Model.Variables.basic.yv
    (function () {
      var _i0;
      for (_i0=0; _i0<n; _i0+=1) {  // EjsS Model.Variables.basic.yv
        yv[_i0] = 0.0;  // EjsS Model.Variables.basic.yv
      }
    }());
    xi = size*1.5; // EjsS Model.Variables.basic.xi
    dx = xmax/n; // EjsS Model.Variables.basic.dx
    tx = new Array(n2); // EjsS Model.Variables.basic.tx
    (function () {
      var _i0;
      for (_i0=0; _i0<n2; _i0+=1) {  // EjsS Model.Variables.basic.tx
        tx[_i0] = 0;  // EjsS Model.Variables.basic.tx
      }
    }());
    txt = new Array(n2); // EjsS Model.Variables.basic.txt
    (function () {
      var _i0;
      for (_i0=0; _i0<n2; _i0+=1) {  // EjsS Model.Variables.basic.txt
        txt[_i0] = "";  // EjsS Model.Variables.basic.txt
      }
    }());
    n3 = 21; // EjsS Model.Variables.basic.n3
    hy = new Array(n3); // EjsS Model.Variables.basic.hy
    (function () {
      var _i0;
      for (_i0=0; _i0<n3; _i0+=1) {  // EjsS Model.Variables.basic.hy
        hy[_i0] = 0.0;  // EjsS Model.Variables.basic.hy
      }
    }());
    hdx = new Array(n3); // EjsS Model.Variables.basic.hdx
    (function () {
      var _i0;
      for (_i0=0; _i0<n3; _i0+=1) {  // EjsS Model.Variables.basic.hdx
        hdx[_i0] = 0.0;  // EjsS Model.Variables.basic.hdx
      }
    }());
    hdy = new Array(n3); // EjsS Model.Variables.basic.hdy
    (function () {
      var _i0;
      for (_i0=0; _i0<n3; _i0+=1) {  // EjsS Model.Variables.basic.hdy
        hdy[_i0] = 0.0;  // EjsS Model.Variables.basic.hdy
      }
    }());
    hdxthread = new Array(n3); // EjsS Model.Variables.basic.hdxthread
    (function () {
      var _i0;
      for (_i0=0; _i0<n3; _i0+=1) {  // EjsS Model.Variables.basic.hdxthread
        hdxthread[_i0] = 0.0;  // EjsS Model.Variables.basic.hdxthread
      }
    }());
    hythread = new Array(n3); // EjsS Model.Variables.basic.hythread
    (function () {
      var _i0;
      for (_i0=0; _i0<n3; _i0+=1) {  // EjsS Model.Variables.basic.hythread
        hythread[_i0] = 0.0;  // EjsS Model.Variables.basic.hythread
      }
    }());
    hythreadrachet = new Array(n3); // EjsS Model.Variables.basic.hythreadrachet
    (function () {
      var _i0;
      for (_i0=0; _i0<n3; _i0+=1) {  // EjsS Model.Variables.basic.hythreadrachet
        hythreadrachet[_i0] = 0.0;  // EjsS Model.Variables.basic.hythreadrachet
      }
    }());
  });

  _model.addToReset(function() {
    np = 6; // EjsS Model.Variables.greendial.np
    h = 3*size; // EjsS Model.Variables.greendial.h
    h2 = h*1.2; // EjsS Model.Variables.greendial.h2
    xp = [3*h,1.5*h,0,0,1.5*h,3*h]; // EjsS Model.Variables.greendial.xp
    yp = [h2,h2,h,-h,-h2,-h2]; // EjsS Model.Variables.greendial.yp
    xpolygon = [[4*h,h2],[0.5*h,h2],[0,h],[0,-h],[0.5*h,-h2],[4*h,-h2]]; // EjsS Model.Variables.greendial.xpolygon
    xpolygondrag = [[4*h+xi,h2],[0.5*h+xi,h2],[0+xi,h],[0+xi,-h],[0.5*h+xi,-h2],[4*h+xi,-h2]]; // EjsS Model.Variables.greendial.xpolygondrag
    alerttext = "drag the object (Spindle or Ratchet) \n to measure length"; // EjsS Model.Variables.greendial.alerttext
  });

  _model.addToReset(function() {
    npr = 6; // EjsS Model.Variables.rachet.npr
    xpr = 3*h; // EjsS Model.Variables.rachet.xpr
    ypr = 0; // EjsS Model.Variables.rachet.ypr
    direction = 1; // EjsS Model.Variables.rachet.direction
    step0 = direction*dx/50; // EjsS Model.Variables.rachet.step0
    step = step0; // EjsS Model.Variables.rachet.step
  });

  _model.addToReset(function() {
    objectpositionx = 0; // EjsS Model.Variables.view.objectpositionx
    objectpositiony = 0; // EjsS Model.Variables.view.objectpositiony
    w = 0.9*ymax; // EjsS Model.Variables.view.w
    L0 = w*1.81; // EjsS Model.Variables.view.L0
    //w2 = Math.max(Math.random()*w,50); // EjsS Model.Variables.view.w2// change size 110 is max
    w2 = <?php echo $_GET['size'];  ?> ; // EjsS Model.Variables.view.w2// change size 110 is max
    
    d = 108; // EjsS Model.Variables.view.d
    ds = 108; // EjsS Model.Variables.view.ds
    Lmax = L0-w2; // EjsS Model.Variables.view.Lmax
    L = L0-d; // EjsS Model.Variables.view.L
    dmin = w2; // EjsS Model.Variables.view.dmin
    x1 = 0.75*size; // EjsS Model.Variables.view.x1
    xzero = xi+d; // EjsS Model.Variables.view.xzero
    id = 0; // EjsS Model.Variables.view.id
    iy = 0; // EjsS Model.Variables.view.iy
    dy = 2*h/(n3-1); // EjsS Model.Variables.view.dy
    ci = -pi/4; // EjsS Model.Variables.view.ci
    dc = pi/2/(n3-1); // EjsS Model.Variables.view.dc
    c = 0.0; // EjsS Model.Variables.view.c
    R = h/Math.sin(-ci); // EjsS Model.Variables.view.R
    yt = new Array(5); // EjsS Model.Variables.view.yt
    (function () {
      var _i0;
      for (_i0=0; _i0<5; _i0+=1) {  // EjsS Model.Variables.view.yt
        yt[_i0] = 0.0;  // EjsS Model.Variables.view.yt
      }
    }());
    txty = new Array(5); // EjsS Model.Variables.view.txty
    (function () {
      var _i0;
      for (_i0=0; _i0<5; _i0+=1) {  // EjsS Model.Variables.view.txty
        txty[_i0] = "";  // EjsS Model.Variables.view.txty
      }
    }());
    tc = 1; // EjsS Model.Variables.view.tc
    error = 0; // EjsS Model.Variables.view.error
  });

  _model.addToReset(function() {
    l_msg = ""; // EjsS Model.Variables.text.l_msg
    idv = ""; // EjsS Model.Variables.text.idv
    l_msg_2 = ""; // EjsS Model.Variables.text.l_msg_2
    integerd = 0; // EjsS Model.Variables.text.integerd
    decimald = 0; // EjsS Model.Variables.text.decimald
    integerd1 = 0; // EjsS Model.Variables.text.integerd1
    decimald1 = 0; // EjsS Model.Variables.text.decimald1
    integerd2 = 0; // EjsS Model.Variables.text.integerd2
    decimald2 = 0; // EjsS Model.Variables.text.decimald2
    l_integerd = ""; // EjsS Model.Variables.text.l_integerd
    l_decimald = ""; // EjsS Model.Variables.text.l_decimald
  });

  _model.addToReset(function() {
    nolock = true; // EjsS Model.Variables.lock.nolock
    lock = false; // EjsS Model.Variables.lock.lock
  });

  _model.addToReset(function() {
    showAnswerFlag = false; // EjsS Model.Variables.check.showAnswerFlag
    answer = 0; // EjsS Model.Variables.check.answer
    l_answer = ""; // EjsS Model.Variables.check.l_answer
    l_enterK1f = ""; // EjsS Model.Variables.check.l_enterK1f
    enterK1f = 0; // EjsS Model.Variables.check.enterK1f
    K1fcorrect = "Micrometer Model"; // EjsS Model.Variables.check.K1fcorrect
    K1fcorrectbackground = ""; // EjsS Model.Variables.check.K1fcorrectbackground
  });

  _model.addToReset(function() {
    showmagnify = true; // EjsS Model.Variables.magnify.showmagnify
    xmagnify = 30; // EjsS Model.Variables.magnify.xmagnify
    ymagnify = 0; // EjsS Model.Variables.magnify.ymagnify
    factor = 1; // EjsS Model.Variables.magnify.factor
    wmagnify = 160; // EjsS Model.Variables.magnify.wmagnify
    ratio = wmagnify/factor; // EjsS Model.Variables.magnify.ratio
  });

  _model.addToReset(function() {
    text = "drag the green slider (Spindle or Ratchet) to measure length"; // EjsS Model.Variables.lookang.text
    selected = new Array(1); // EjsS Model.Variables.lookang.selected
    (function () {
      var _i0;
      for (_i0=0; _i0<1; _i0+=1) {  // EjsS Model.Variables.lookang.selected
        selected[_i0] = "shm_with_xo=0,vo=2";  // EjsS Model.Variables.lookang.selected
      }
    }());
    ddragme = xi+d+1.5*h; // EjsS Model.Variables.lookang.ddragme
  bottomdragmesize = -w*2+size+w2; // EjsS Model.Variables.lookang.bottomdragmesize //i commentted object resizing
    anyapp = iOSapp||Androidapp; // EjsS Model.Variables.lookang.anyapp
    isAndroid = checkAndroid(); // EjsS Model.Variables.lookang.isAndroid
    iOS = /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream; // EjsS Model.Variables.lookang.iOS
    Android = /Android|android/i.test(navigator.userAgent); // EjsS Model.Variables.lookang.Android
    iPad = /iPad/.test(navigator.userAgent) && !window.MSStream; // EjsS Model.Variables.lookang.iPad
    iPhone = /iPhone|iPod/.test(navigator.userAgent) && !window.MSStream; // EjsS Model.Variables.lookang.iPhone
    dragmex = size*3; // EjsS Model.Variables.lookang.dragmex
    dragmexs = ddragme; // EjsS Model.Variables.lookang.dragmexs
    dragmey = ymin*3/4; // EjsS Model.Variables.lookang.dragmey
    tdrag = 0; // EjsS Model.Variables.lookang.tdrag
/*    Width = "100%"; // EjsS Model.Variables.lookang.Width
    Height = (_isEPub)?"500":"100%"; // EjsS Model.Variables.lookang.Height*/
     Width = (_isEPub)?"400":"100%"; // EjsS Model.Variables.layout.Width
    Height = (_isEPub)?"500":"100%"; // EjsS Model.Variables.layout.Height
    Width1 = "100%"; // EjsS Model.Variables.lookang.Width1
    Width2 = "50%"; // EjsS Model.Variables.lookang.Width2
    vvst = true; // EjsS Model.Variables.lookang.vvst
    KEvstime = true; // EjsS Model.Variables.lookang.KEvstime
    world = true; // EjsS Model.Variables.lookang.world
    xmodel = 0; // EjsS Model.Variables.lookang.xmodel
    showmodel = true; // EjsS Model.Variables.lookang.showmodel
    functionY = "0"; // EjsS Model.Variables.lookang.functionY
  });

  if (_inputParameters) {
    _inputParameters = _model.parseInputParameters(_inputParameters);
    if (_inputParameters) _model.addToReset(function() { _model._readParameters(_inputParameters); });
  }

  _model.addToReset(function() {
    _model.setAutoplay(false);
    _model.setPauseOnPageExit(true);
    _model.setFPS(20);
    _model.setStepsPerDisplay(1);
  });


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

  function showRewardVideo() {  // > CustomCode.Adsmob:1
    const e = new Event("click");  // > CustomCode.Adsmob:2
    try { // allow code to run in browser  // > CustomCode.Adsmob:3
    const element = parent.document.getElementById("banner");  // > CustomCode.Adsmob:4
    element.dispatchEvent(e);  // > CustomCode.Adsmob:5
    } catch(e) {  // > CustomCode.Adsmob:6
     const element = false;   // > CustomCode.Adsmob:7
      }  // > CustomCode.Adsmob:8
   }  // > CustomCode.Adsmob:9
   function showBannerAd() {  // > CustomCode.Adsmob:10
    const e = new Event("click");  // > CustomCode.Adsmob:11
    try { // allow code to run in browser   // > CustomCode.Adsmob:12
    const element = parent.document.getElementById("reward");  // > CustomCode.Adsmob:13
    element.dispatchEvent(e);  // > CustomCode.Adsmob:14
    } catch(e) {  // > CustomCode.Adsmob:15
     const element = false;   // > CustomCode.Adsmob:16
      }  // > CustomCode.Adsmob:17
   }  // > CustomCode.Adsmob:18
   function showInterstitialAds() {  // > CustomCode.Adsmob:19
    const e = new Event("click");  // > CustomCode.Adsmob:20
    try { // allow code to run  in browser  // > CustomCode.Adsmob:21
    const element = parent.document.getElementById("interstitial");  // > CustomCode.Adsmob:22
    element.dispatchEvent(e);  // > CustomCode.Adsmob:23
    } catch(e) {  // > CustomCode.Adsmob:24
     const element = false;   // > CustomCode.Adsmob:25
      }  // > CustomCode.Adsmob:26
   }  // > CustomCode.Adsmob:27

  function speech (option) {  // > CustomCode.Speech:3
  // allow code to run in Student Learning Space   // > CustomCode.Speech:4
  var isCordova = (!!this.parent.cordova || !!window.cordova);  // > CustomCode.Speech:5
  if(isCordova) { // check it is running in Android or iOS  // > CustomCode.Speech:6
            // > CustomCode.Speech:7
  	parent.TTS.speak({text:option,locale:'en-US'});  // > CustomCode.Speech:8
  } else {  // > CustomCode.Speech:9
      var msg = new SpeechSynthesisUtterance(option);  // > CustomCode.Speech:10
    
      msg.lang = 'en-US'; // need for android?  // > CustomCode.Speech:17
     
      window.speechSynthesis.speak(msg);  // > CustomCode.Speech:26
    }  // > CustomCode.Speech:27
  }  // > CustomCode.Speech:28

 
  function changeOrientation() {  // > CustomCode.changeOrientation:5
     // > CustomCode.changeOrientation:6
  var k =1; // k control height 1 is for full screen, 0.9 shorten etc  // > CustomCode.changeOrientation:7
  var kapple =0.95; // control apple app height  // > CustomCode.changeOrientation:8
  var kepub =0.90;  // > CustomCode.changeOrientation:9
  // check platform for Apps  // > CustomCode.changeOrientation:10
  try { // allow code to run in Student Learning Space   // > CustomCode.changeOrientation:11
    var iOSapp =  (typeof parent.device != 'undefined' && parent.device.platform == "iOS");  // > CustomCode.changeOrientation:12
    var Androidapp = (typeof parent.device != 'undefined' && parent.device.platform == "Android");  // > CustomCode.changeOrientation:13
  } catch(e) {  // > CustomCode.changeOrientation:14
    var iOSapp = false;  // > CustomCode.changeOrientation:15
    var Androidapp = false;  // > CustomCode.changeOrientation:16
  }  // > CustomCode.changeOrientation:17
  // check platform for web browsers  // > CustomCode.changeOrientation:18
  var iOS =/iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;  // > CustomCode.changeOrientation:19
  var iPad =/iPad/.test(navigator.userAgent) && !window.MSStream;  // > CustomCode.changeOrientation:20
  var iPhone = /iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;  // > CustomCode.changeOrientation:21
  var Android= /Android|android/i.test(navigator.userAgent);  // > CustomCode.changeOrientation:22
  //navigator  // > CustomCode.changeOrientation:23
  var Firefox = navigator.userAgent.indexOf("Firefox") != -1;  // > CustomCode.changeOrientation:24
     // > CustomCode.changeOrientation:25
  switch (window.orientation) { // using window.orientation as deciding factor  // > CustomCode.changeOrientation:26
    case 0:  // > CustomCode.changeOrientation:27
    case 180:  // > CustomCode.changeOrientation:28
      this.screenOrientation = 'portrait';  // > CustomCode.changeOrientation:29
      if (iOSapp){ // does not seems to work  // > CustomCode.changeOrientation:30
          // > CustomCode.changeOrientation:31
        return window.screen.height*kapple;  //0.1 for app and 0.1 for nonfullscreenapp    // > CustomCode.changeOrientation:32
        // > CustomCode.changeOrientation:33
      }  // > CustomCode.changeOrientation:34
      else if (_isEPub){ // does not seems to work  // > CustomCode.changeOrientation:35
        //   return Math.max(window.screen.width,window.screen.height)*0.9;  // > CustomCode.changeOrientation:36
        return window.innerHeight*kepub;  //0.1 for app and 0.1 for nonfullscreenapp    // > CustomCode.changeOrientation:37
   
      }  // > CustomCode.changeOrientation:41
       // > CustomCode.changeOrientation:42
      else {  // > CustomCode.changeOrientation:43
       return window.innerHeight*k;  // > CustomCode.changeOrientation:44
        //return 100*k+"vh";  // > CustomCode.changeOrientation:45
      }  // > CustomCode.changeOrientation:46
      break;  // > CustomCode.changeOrientation:47
    case 90:  // > CustomCode.changeOrientation:48
    case -90:  // > CustomCode.changeOrientation:49
      this.screenOrientation = 'landscape';  // > CustomCode.changeOrientation:50
     // > CustomCode.changeOrientation:51
      if (iOSapp){ // App  // > CustomCode.changeOrientation:52
        return window.screen.width*kapple;    // > CustomCode.changeOrientation:53
        
      }  // > CustomCode.changeOrientation:57
      else if (_isEPub){ // does not seems to work  // > CustomCode.changeOrientation:58
        //   return Math.max(window.screen.width,window.screen.height)*0.9;  // > CustomCode.changeOrientation:59
        return window.innerHeight*kepub;  //0.1 for app and 0.1 for nonfullscreenapp    // > CustomCode.changeOrientation:60
     
      }  // > CustomCode.changeOrientation:64
       // > CustomCode.changeOrientation:65
      else {  // > CustomCode.changeOrientation:66
        return window.innerHeight*k;  // > CustomCode.changeOrientation:67
        //return 100*k+"vh"; // safari produce error  // > CustomCode.changeOrientation:68
        }  // > CustomCode.changeOrientation:69
      break;  // > CustomCode.changeOrientation:70
    default:  // > CustomCode.changeOrientation:71
      this.screenOrientation = 'unknown';  // > CustomCode.changeOrientation:72
      //       return (iPad)?""+(window.screen.width+window.screen.height)*0.4:((iPhone)?""+window.screen.width:_view._format(window.innerHeight*0.9,"0"));  // > CustomCode.changeOrientation:73
       if (Firefox){  // > CustomCode.changeOrientation:74
        return window.innerHeight*k;// number as of 20180831 Firefox does not support vh yet so need a separate line to handle  // > CustomCode.changeOrientation:75
        }  // > CustomCode.changeOrientation:76
 
        else {  // > CustomCode.changeOrientation:83
        //alert();  // > CustomCode.changeOrientation:84
        // return 100*k+"%"; // work on fullscreen works in EJSS6.0beta  // > CustomCode.changeOrientation:85
          //  works in EjsS_5.3_180131  // > CustomCode.changeOrientation:86
        return  window.innerHeight*k; // work on panel   // > CustomCode.changeOrientation:87
           // > CustomCode.changeOrientation:88
  }  // > CustomCode.changeOrientation:89
  }  // > CustomCode.changeOrientation:90
     // > CustomCode.changeOrientation:91
  }  // > CustomCode.changeOrientation:92

  //code reference: http://davidwalsh.name/detect-android  // > CustomCode.android:1
  function checkAndroid () {  // > CustomCode.android:2
    var ua = navigator.userAgent.toLowerCase();  // > CustomCode.android:3
    return ua.indexOf("android") > -1; //&& ua.indexOf("mobile");  // > CustomCode.android:4
  }  // > CustomCode.android:5

  _model.addToInitialization(function() {
    if (!__pagesEnabled["Init Page"]) return;
    for(var i=0;i<n;i++){  // > Initialization.Init Page:1
     xv[i]=xi+i*dx; // drawing lines marking on the main scale  // > Initialization.Init Page:2
      if(i%2===0){  // > Initialization.Init Page:3
       yv[i]=size2; // ALL upper part y coordinate of line size2 which is a fraction of range  // > Initialization.Init Page:4
         // > Initialization.Init Page:5
       if(i%10===0){  // > Initialization.Init Page:6
        yv[i]*=2;    // *= is not equal to 2 0,5,10,15y coordinate of line 2   // > Initialization.Init Page:7
          // > Initialization.Init Page:8
        if(i%20===0)  // > Initialization.Init Page:9
          // > Initialization.Init Page:10
        yv[i]*=1.25;  // 0,10 y position coordinate of line    // > Initialization.Init Page:11
      tx[i/10]=xv[i];  // generate the x coordinate of 0 5 10 15  // > Initialization.Init Page:12
     txt[i/10]=(i/2)+""; // clever way to make txt 0 5 10 15  // > Initialization.Init Page:13
     // when i = 10 , txt[1] = 5; when i = 20 , txt [2] = 10, when i =30, txt = 15  // > Initialization.Init Page:14
       // > Initialization.Init Page:15
       }  // > Initialization.Init Page:16
      }else yv[i]=-size2; // to flip the lines downwards  // > Initialization.Init Page:17
    }  // > Initialization.Init Page:18
     //_step(); // no idea what this do   // > Initialization.Init Page:19
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["message"]) return;
    if (_isMobile){  // > Initialization.message:1
      //do nothing  // > Initialization.message:2
      }  // > Initialization.message:3
        // > Initialization.message:4
      else{  // > Initialization.message:5
        // copy this into the initialization  // > Initialization.message:6
    // make the font bigger  // > Initialization.message:7
    _view.plottingPanel.getMessageDecoration("TL").getFont().setFontSize("1vw");  // > Initialization.message:8
    _view.plottingPanel.getMessageDecoration("TR").getFont().setFontSize("1vw");  // > Initialization.message:9
    _view.plottingPanel.getMessageDecoration("BL").getFont().setFontSize("1vw");  // > Initialization.message:10
    _view.plottingPanel.getMessageDecoration("BR").getFont().setFontSize("2vw");  // > Initialization.message:11
        }  // > Initialization.message:12
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["undefined"]) return;
    if (dragemetrue==undefined){  // > Initialization.undefined:1
      dragemetrue=false;  // > Initialization.undefined:2
      }   // > Initialization.undefined:3
      if (dragemetrue2==undefined){  // > Initialization.undefined:4
      dragemetrue2=false;  // > Initialization.undefined:5
      }  // > Initialization.undefined:6
       if (show2==undefined){  // > Initialization.undefined:7
      show2=true;  // > Initialization.undefined:8
      }  // > Initialization.undefined:9
       if (show==undefined){  // > Initialization.undefined:10
      show=false;  // > Initialization.undefined:11
      }  // > Initialization.undefined:12
        // > Initialization.undefined:13
      if (showhint==undefined){  // > Initialization.undefined:14
      showhint=true;  // > Initialization.undefined:15
      }  // > Initialization.undefined:16
      if (firsttime==undefined){  // > Initialization.undefined:17
      firsttime=true;  // > Initialization.undefined:18
      }  // > Initialization.undefined:19
      if (firsttime2==undefined){  // > Initialization.undefined:20
      firsttime2=true;  // > Initialization.undefined:21
      }  // > Initialization.undefined:22
    // to make menu none at the beginning  // > Initialization.undefined:23
    _view.inputfield.getStyle().setDisplay("none");  // > Initialization.undefined:24
    //kheight=0.96;  // > Initialization.undefined:25
  });

  _model.addToInitialization(function() {
    if (!__pagesEnabled["radial"]) return;
    //golden color  // > Initialization.radial:1
    var container = document.createElement('div');  // > Initialization.radial:2
    var svggradient = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1"><defs>'+  // > Initialization.radial:3
      '  <radialGradient id="mygrandient" cx="50%" cy="50%" r="80%" fx="30%" fy="30%">'+  // > Initialization.radial:4
      '    <stop offset="0%" style="stop-color:rgb(0,0,255); stop-opacity:1" />'+  // > Initialization.radial:5
      '    <stop offset="100%" style="stop-color:rgb(0,0,255);stop-opacity:0" />'+  // > Initialization.radial:6
      '  </radialGradient>'+  // > Initialization.radial:7
      '</defs></svg>';  // > Initialization.radial:8
    container.innerHTML = svggradient;  // > Initialization.radial:9
    document.body.appendChild(container);  // > Initialization.radial:10
    //"url(#mygrandient)"  // > Initialization.radial:11
    var container = document.createElement('div');  // > Initialization.radial:12
    var svggradient = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1"><defs>'+  // > Initialization.radial:13
      '  <radialGradient id="mygrandient1" cx="30%" cy="30%" r="70%" fx="50%" fy="50%">'+  // > Initialization.radial:14
      '    <stop offset="0%" style="stop-color:rgb(0,0,0); stop-opacity:0.5" />'+  // > Initialization.radial:15
      '    <stop offset="100%" style="stop-color:rgb(0,0,150);stop-opacity:0.5" />'+  // > Initialization.radial:16
      '  </radialGradient>'+  // > Initialization.radial:17
      '</defs></svg>';  // > Initialization.radial:18
    container.innerHTML = svggradient;  // > Initialization.radial:19
    document.body.appendChild(container);  // > Initialization.radial:20
    var container = document.createElement('div');  // > Initialization.radial:21
    var svggradient = '<svg xmlns="http://www.w3.org/2000/svg" version="1.1"><defs>'+  // > Initialization.radial:22
      '  <radialGradient id="mygrandient2" cx="50%" cy="50%" r="80%" fx="30%" fy="80%">'+  // > Initialization.radial:23
      '    <stop offset="0%" style="stop-color:rgb(255,255,255); stop-opacity:1" />'+  // > Initialization.radial:24
      '    <stop offset="100%" style="stop-color:rgb(0,0,200);stop-opacity:0" />'+  // > Initialization.radial:25
      '  </radialGradient>'+  // > Initialization.radial:26
      '</defs></svg>';  // > Initialization.radial:27
    container.innerHTML = svggradient;  // > Initialization.radial:28
    document.body.appendChild(container);  // > Initialization.radial:29
    //"url(#mygrandient)"  // > Initialization.radial:30
  });

  _model.addToInitialization(function() {
    firsttime2=false;
    if (!__pagesEnabled["alert"]) return;
    if (firsttime2==true){  // > Initialization.alert:1
  
    firsttime2=false;  // > Initialization.alert:7
    }  // > Initialization.alert:8
  });

  _model.addToEvolution(function() {
    if (!__pagesEnabled["Evol Page"]) return;
    if(lock==true) return;  // > Evolution.Evol Page:1
    d=d-direction*step; // change to - by lookang to close jaws  // > Evolution.Evol Page:2
    t = t+step;  // > Evolution.Evol Page:3
    if (d<=0){  // > Evolution.Evol Page:4
      d = 0;  // > Evolution.Evol Page:5
     // _pause();  // > Evolution.Evol Page:6
       direction=-1; //reverse after hitting object  // > Evolution.Evol Page:7
        // > Evolution.Evol Page:8
      }  // > Evolution.Evol Page:9
    if (d>=150){  // > Evolution.Evol Page:10
      d = 150;  // > Evolution.Evol Page:11
     // _pause();  // > Evolution.Evol Page:12
       direction=1; //reverse after hitting object  // > Evolution.Evol Page:13
        // > Evolution.Evol Page:14
      }    // > Evolution.Evol Page:15
    
    if(y<=size2) { // object has moved y in jaws  // > Evolution.Evol Page:18
      d=Math.max(d,w2);  // > Evolution.Evol Page:19
        // > Evolution.Evol Page:20
      }  // > Evolution.Evol Page:21
      if (d <= w2&&y<=size2){  // > Evolution.Evol Page:22
     _pause();  // > Evolution.Evol Page:23
     direction=-1; //reverse after hitting object  // > Evolution.Evol Page:24
  
        _view.inputfield.getStyle().setDisplay("inline-flex");  // > Evolution.Evol Page:29
   
        }  // > Evolution.Evol Page:32
    L=L0-d;  // > Evolution.Evol Page:33
  });

  _model.addToFixedRelations(function() { _isPaused = _model.isPaused(); _isPlaying = _model.isPlaying(); });

  _model.addToFixedRelations(function() {
    if (!__pagesEnabled["FixRel Page 2"]) return;
    //this the codes that causes mobile to lag when dragging spindle  // > FixedRelations.FixRel Page 2:1
    xzero=xi+d;  // > FixedRelations.FixRel Page 2:2
    zero=0.;  // > FixedRelations.FixRel Page 2:3
    id=parseInt(d/dx*50);  // > FixedRelations.FixRel Page 2:4
    tc=0;  // > FixedRelations.FixRel Page 2:5
    for(var i=0;i<n3;i++){  // > FixedRelations.FixRel Page 2:6
     iy=id+i-10+error;  // > FixedRelations.FixRel Page 2:7
     if(iy<0)iy+=50;  // > FixedRelations.FixRel Page 2:8
     iy=iy%50;  // > FixedRelations.FixRel Page 2:9
     c=ci+dc*i;  // > FixedRelations.FixRel Page 2:10
     hy[i]=R*Math.sin(c);  // > FixedRelations.FixRel Page 2:11
       // > FixedRelations.FixRel Page 2:12
     hythread[i] = 1.2*R*Math.sin(c); // draw thread at higher y to fill the green dial broad part  // > FixedRelations.FixRel Page 2:13
     hythreadrachet[i] = 0.5*R*Math.sin(c);// draw thread at lower y to fill the rachet part  // > FixedRelations.FixRel Page 2:14
       // > FixedRelations.FixRel Page 2:15
     if(iy%5===0){  // > FixedRelations.FixRel Page 2:16
         // > FixedRelations.FixRel Page 2:17
        // > FixedRelations.FixRel Page 2:18
      if(iy%10==0){  // > FixedRelations.FixRel Page 2:19
        hdx[i]=1.5*size; // if iy%10==0 draw a 1.5*size line  // > FixedRelations.FixRel Page 2:20
      hdy[i] = c*7; // seems to work to create fake3D circular view  // > FixedRelations.FixRel Page 2:21
      }  // > FixedRelations.FixRel Page 2:22
        // > FixedRelations.FixRel Page 2:23
      else {  // > FixedRelations.FixRel Page 2:24
        hdx[i]=size; // if iy%5==0 draw a size line  // > FixedRelations.FixRel Page 2:25
    //  hdy[i] = 2*Math.sin(c*3);  // > FixedRelations.FixRel Page 2:26
    hdy[i] = c*7/2;  // > FixedRelations.FixRel Page 2:27
      }  // > FixedRelations.FixRel Page 2:28
        // > FixedRelations.FixRel Page 2:29
     if(tc<5){  // > FixedRelations.FixRel Page 2:30
      yt[tc]=hy[i];  // > FixedRelations.FixRel Page 2:31
      //add _5 instead of 5 to slign circular readings  // > FixedRelations.FixRel Page 2:32
     // if (iy<10){  // > FixedRelations.FixRel Page 2:33
     //   txty[tc]="0"+iy;  // > FixedRelations.FixRel Page 2:34
     //   }  // > FixedRelations.FixRel Page 2:35
     // else { //continue to do normally 10 15 20 align already  // > FixedRelations.FixRel Page 2:36
        txty[tc]=iy+"";  // > FixedRelations.FixRel Page 2:37
     // }  // > FixedRelations.FixRel Page 2:38
      tc++;  // > FixedRelations.FixRel Page 2:39
     }  // > FixedRelations.FixRel Page 2:40
       // > FixedRelations.FixRel Page 2:41
     }  // > FixedRelations.FixRel Page 2:42
       // > FixedRelations.FixRel Page 2:43
     else {  // > FixedRelations.FixRel Page 2:44
     hdx[i]=size2; // the rest draw a size2 line  // > FixedRelations.FixRel Page 2:45
    // hdy[i] = Math.sin(c*3); // small delta up and down  // > FixedRelations.FixRel Page 2:46
      hdy[i] = c*7/4;  // > FixedRelations.FixRel Page 2:47
      hdxthread[i]=-5*size2; // lines to make thread same and draw -5*size2 direction  // > FixedRelations.FixRel Page 2:48
    }  // > FixedRelations.FixRel Page 2:49
    }  // > FixedRelations.FixRel Page 2:50
  });

  _model.addToFixedRelations(function() {
    if (!__pagesEnabled["hintnew"]) return;
    //integerd =parseInt(id/100); // integer ( 840.0/100) = 8.0  // > FixedRelations.hintnew:1
    integerd =parseInt((id+error)/100); // integer ( 840.0/100) = 8.0  // > FixedRelations.hintnew:2
    decimald =(-integerd*100+id)/100.;  // > FixedRelations.hintnew:3
    // for kim kia suggestion  // > FixedRelations.hintnew:4
    integerd2 =Math.floor((id+error)/50)*50/100; // integer ( 840.0/100) = 8.0  // > FixedRelations.hintnew:5
    decimald2 =(-integerd2*100+id)/100.;  // > FixedRelations.hintnew:6
    //l_integerd = _view._format(integerd,"0")+".0 mm"; // +"0" is the trick to create extra zero  // > FixedRelations.hintnew:7
    l_integerd = integerd.toFixed(2)+" mm";  // > FixedRelations.hintnew:8
    l_integerd2 = integerd2.toFixed(2)+" mm";  // > FixedRelations.hintnew:9
    // codes added to address Ered post on making significant of zero error clear  // > FixedRelations.hintnew:10
    if ( error === 0 ) {  // > FixedRelations.hintnew:11
    //  l_decimald = double2String(decimald,1000.0 )+" mm";  // > FixedRelations.hintnew:12
        l_decimald = _view._format(decimald,"0.00")+" mm"; // to solve problem of id = 920 and idv = 9.20  // > FixedRelations.hintnew:13
        l_decimald2 = _view._format(decimald2,"0.00")+" mm"; //  // > FixedRelations.hintnew:14
    }  // > FixedRelations.hintnew:15
    else if((error>0)){  // > FixedRelations.hintnew:16
    l_decimald = _view._format(decimald+error/100,"0.00")+"-("+ _view._format(error/100,"0.00")+")"+" mm "; // to solve problem of id = 920 and idv = 9.20  // > FixedRelations.hintnew:17
    l_decimald2 = _view._format(decimald2+error/100,"0.00")+"-("+ _view._format(error/100,"0.00")+")"+" mm "; // to solve problem of id = 920 and idv = 9.20  // > FixedRelations.hintnew:18
    }  // > FixedRelations.hintnew:19
          // > FixedRelations.hintnew:20
    else if((error<0)){  // > FixedRelations.hintnew:21
    l_decimald = _view._format(decimald+error/100,"0.00")+"-("+ _view._format(error/100,"0.00")+")"+" mm "; // to solve problem of id = 920 and idv = 9.20  // > FixedRelations.hintnew:22
    l_decimald2 = _view._format(decimald2+error/100,"0.00")+"-("+ _view._format(error/100,"0.00")+")"+" mm "; // to solve problem of id = 920 and idv = 9.20  // > FixedRelations.hintnew:23
    }  // > FixedRelations.hintnew:24
          // > FixedRelations.hintnew:25
  });

  _model.addToFixedRelations(function() {
    if (testMode) {

    if (!__pagesEnabled["showanswer"]) return;
    if(id/10===parseInt(id/10)) {  // > FixedRelations.showanswer:1
        idv=(id/100.)+"0"; // to solve problem of id = 920 and idv = 9.20  // > FixedRelations.showanswer:2
                                }  // > FixedRelations.showanswer:3
    else {  // > FixedRelations.showanswer:4
      idv=id/100.+"";  // > FixedRelations.showanswer:5
        // > FixedRelations.showanswer:6
          }  // > FixedRelations.showanswer:7
        answer= ""+_view._format(idv,"0.00"); // convert to double to be used in check  // > FixedRelations.showanswer:8
        l_answer=idv+"";  // > FixedRelations.showanswer:9
    if(show===true&&show2==false)  // > FixedRelations.showanswer:10
    {  // > FixedRelations.showanswer:11
     //   l_msg="d = "+_view._format(idv,"0.00")+" mm"; // wanted to make clearer but did not  // > FixedRelations.showanswer:12
      l_msg="d = "+_view._format(integerd,"0.0")+"+"+_view._format(l_decimald,"0.00")+"-("+_view._format(error/100,"0.00")+")= "+ +_view._format(idv,"0.00")+" mm"; // wanted to make clearer but did not  // > FixedRelations.showanswer:13
    }  // > FixedRelations.showanswer:14
    else if(show2===true&&show==false)  // > FixedRelations.showanswer:15
    {  // > FixedRelations.showanswer:16
     //   l_msg="d = "+_view._format(idv,"0.00")+" mm"; // wanted to make clearer but did not  // > FixedRelations.showanswer:17
      l_msg="d = "+_view._format(integerd2,"0.0")+"+"+_view._format(l_decimald2,"0.00")+"-("+_view._format(error/100,"0.00")+")= "+ +_view._format(idv,"0.00")+" mm"; // wanted to make clearer but did not  // > FixedRelations.showanswer:18
    }  // > FixedRelations.showanswer:19
      else {  // > FixedRelations.showanswer:20
      l_msg="d = ??? mm";  // > FixedRelations.showanswer:21
           }  // > FixedRelations.showanswer:22
    }
  });

  _model.addToFixedRelations(function() {
    if (!__pagesEnabled["check"]) return;
    if (showAnswerFlag==false){   // > FixedRelations.check:1
    K1fcorrect = "";  // > FixedRelations.check:2
    }  // > FixedRelations.check:3
    else if (showAnswerFlag==true){  // > FixedRelations.check:4
                                 if(l_answer==l_enterK1f){  // > FixedRelations.check:5
                      K1fcorrect = "Great! You have \n the right answer!";  // > FixedRelations.check:6
                      //alert("Great! You have \n the right answer!");  // > FixedRelations.check:7
                      EJSS_INTERFACE.BoxPanel.showOkDialog("Great! You have \n the right answer!");  // > FixedRelations.check:8
       // > FixedRelations.check:9
                      K1fcorrectbackground = "rgba(0,255,0,255)";  // > FixedRelations.check:10
                                                           }  // > FixedRelations.check:11
                                  else if (Math.abs(answer-l_enterK1f)<1.e-7){// same value but different digits or incorrect format  // > FixedRelations.check:12
                         K1fcorrect = " Check the number of digits ";  // > FixedRelations.check:13
                        K1fcorrectbackground = "rgba(255,200,0,255)";  // > FixedRelations.check:14
                        //alert(" Check the number of digits ");  // > FixedRelations.check:15
                      EJSS_INTERFACE.BoxPanel.showOkDialog(" Check the number of digits ");  // > FixedRelations.check:16
                                                             }  // > FixedRelations.check:17
                                   else {  // > FixedRelations.check:18
                             K1fcorrect = " Incorrect, \n Your input is out by \n"+ _view._format(answer-l_enterK1f,"0.00") ;  // > FixedRelations.check:19
                            K1fcorrectbackground = "rgba(255,0,0,255)";  // > FixedRelations.check:20
                            //alert("try again using the hint show on the dropdown menu");  // > FixedRelations.check:21
                            EJSS_INTERFACE.BoxPanel.showOkDialog("try again using the hint show on the dropdown menu");  // > FixedRelations.check:22
                                         }  // > FixedRelations.check:23
                     //   }  // > FixedRelations.check:24
    showAnswerFlag=false; // set back to false  // > FixedRelations.check:25
    speech(K1fcorrect);  // > FixedRelations.check:26
   
    }  // > FixedRelations.check:38
  });

  _model.addToFixedRelations(function() {
    if (!__pagesEnabled["preventgoing over"]) return;
    if (d<=0){  // > FixedRelations.preventgoing over:1
      d = 0;  // > FixedRelations.preventgoing over:2
     // _pause();  // > FixedRelations.preventgoing over:3
      direction=-1; //reverse after hitting object  // > FixedRelations.preventgoing over:4
        // > FixedRelations.preventgoing over:5
      }  // > FixedRelations.preventgoing over:6
      if (d>=150){  // > FixedRelations.preventgoing over:7
      d = 150;  // > FixedRelations.preventgoing over:8
     // _pause();  // > FixedRelations.preventgoing over:9
       direction=1; //reverse after hitting object  // > FixedRelations.preventgoing over:10
        // > FixedRelations.preventgoing over:11
      }   // > FixedRelations.preventgoing over:12
      if(y<=size2) { // object has moved y in jaws  // > FixedRelations.preventgoing over:13
      d=Math.max(d,w2);  // > FixedRelations.preventgoing over:14
        // > FixedRelations.preventgoing over:15
      }  // > FixedRelations.preventgoing over:16
  });

  _model.addToFixedRelations(function() { _isPaused = _model.isPaused(); _isPlaying = _model.isPlaying(); });

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
    _view = new Micrometer02_View(_topFrame,_viewNumber,_libraryPath,_codebasePath);
    var _view_super_reset = _view._reset;
    _view._reset = function() {
      _view_super_reset();
      switch(_viewNumber) {
        case -10 : break; // make Lint happy
        default :
        case 0:
          _view.plottingPanel.linkProperty("Height",  function() { return changeOrientation(); }, function(_v) { changeOrientation() = _v; } ); // HtmlView Page linking property 'Height' for element 'plottingPanel'
          _view.plottingPanel.setAction("OnDoubleClick", function(_data,_info) {
  _pause();
  toggleFullScreen();

}); // HtmlView Page setting action 'OnDoubleClick' for element 'plottingPanel'
          _view.plottingPanel.setAction("OnDrag", function(_data,_info) {
  if ((mx<xi+d+3*h&&mx>xi+d+0&&my<h2&&my>-h2)||(mx<xi+d+3*h+h&&mx>xi+d+3*h&&my<h/2&&my>-h/2)){
    test = 1;
  if (my>mys) d = d-step/4; // move up
  if (my<mys) d = d+step/4; // move down
  d=Math.max(0,d);
  d=Math.min(160,d);
  if(y<size2 && d<w2)d=w2; // move the darkgreen
  L=L0-d; // move the darkgreen
  }
  test = 0;
  _view.plottingPanel.setProperty("MinimumX",Math.max(_view.plottingPanel.getProperty("MinimumX"),-350));
  _view.plottingPanel.setProperty("MaximumX",Math.min(_view.plottingPanel.getProperty("MaximumX"),350));
  _view.plottingPanel.setProperty("MinimumY",Math.max(_view.plottingPanel.getProperty("MinimumY"),-200));
  _view.plottingPanel.setProperty("MaximumY",Math.min(_view.plottingPanel.getProperty("MaximumY"),200));
  _view.plottingPanel.setZoomLimits([200,600]);

}); // HtmlView Page setting action 'OnDrag' for element 'plottingPanel'
          _view.plottingPanel.setAction("OnZoom", function(_data,_info) {
  
  _view.plottingPanel.setZoomLimits([200,600]);

}); // HtmlView Page setting action 'OnZoom' for element 'plottingPanel'
          _view.plottingPanel.linkProperty("Visibility",  function() { return world===true; } ); // HtmlView Page linking property 'Visibility' for element 'plottingPanel'
          _view.plottingPanel.linkProperty("BLMessage",  function() { return K1fcorrect; }, function(_v) { K1fcorrect = _v; } ); // HtmlView Page linking property 'BLMessage' for element 'plottingPanel'
          _view.plottingPanel.linkProperty("BRMessage",  function() { return l_msg; }, function(_v) { l_msg = _v; } ); // HtmlView Page linking property 'BRMessage' for element 'plottingPanel'
          _view.Frameorange.linkProperty("Maximum",  function() { return pi; }, function(_v) { pi = _v; } ); // HtmlView Page linking property 'Maximum' for element 'Frameorange'
          _view.right2magenta2.linkProperty("SizeX",  function() { return 2*size; } ); // HtmlView Page linking property 'SizeX' for element 'right2magenta2'
          _view.right2magenta2.linkProperty("X",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'X' for element 'right2magenta2'
          _view.right2magenta2.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'right2magenta2'
          _view.right2magenta2.linkProperty("SizeY",  function() { return 6*size; } ); // HtmlView Page linking property 'SizeY' for element 'right2magenta2'
          _view.leftanvilgrey2.linkProperty("SizeX",  function() { return size; }, function(_v) { size = _v; } ); // HtmlView Page linking property 'SizeX' for element 'leftanvilgrey2'
          _view.leftanvilgrey2.linkProperty("X",  function() { return -w*2+size2; } ); // HtmlView Page linking property 'X' for element 'leftanvilgrey2'
          _view.leftanvilgrey2.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'leftanvilgrey2'
          _view.leftanvilgrey2.linkProperty("SizeY",  function() { return size*1.5; } ); // HtmlView Page linking property 'SizeY' for element 'leftanvilgrey2'
          _view.leftanvil2greytip2.linkProperty("SizeX",  function() { return size/2; } ); // HtmlView Page linking property 'SizeX' for element 'leftanvil2greytip2'
          _view.leftanvil2greytip2.linkProperty("X",  function() { return -w*2+size2; } ); // HtmlView Page linking property 'X' for element 'leftanvil2greytip2'
          _view.leftanvil2greytip2.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'leftanvil2greytip2'
          _view.leftanvil2greytip2.linkProperty("SizeY",  function() { return size*1.5; } ); // HtmlView Page linking property 'SizeY' for element 'leftanvil2greytip2'
          _view.test.linkProperty("X",  function() { return -w*2+size2+size/2; } ); // HtmlView Page linking property 'X' for element 'test'
          _view.test.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'test'
          _view.test2.linkProperty("X",  function() { return -0.75*size-L; } ); // HtmlView Page linking property 'X' for element 'test2'
          _view.test2.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'test2'
          _view.object22.linkProperty("SizeX",  function() { return w2; }, function(_v) { w2 = _v; } ); // HtmlView Page linking property 'SizeX' for element 'object22'
          _view.object22.linkProperty("X",  function() { return -w*2+size; } ); // HtmlView Page linking property 'X' for element 'object22'
          _view.object22.linkProperty("Y",  function() { return y; }, function(_v) { y = _v; } ); // HtmlView Page linking property 'Y' for element 'object22'
          _view.object22.linkProperty("SizeY",  function() { return 6*size; } ); // HtmlView Page linking property 'SizeY' for element 'object22'
          _view.object22.setAction("OnDrag", function(_data,_info) {
  if(d<w2)y=Math.max(y,size2);
  if(d<w2&& y<size*0.75){
    y=size*0.75;
  }
  y=Math.max(y,-2*size);

}); // HtmlView Page setting action 'OnDrag' for element 'object22'
          _view.bottomposition.linkProperty("X",  function() { return -w*2+size+w2/2; } ); // HtmlView Page linking property 'X' for element 'bottomposition'
          _view.bottomposition.linkProperty("Y",  function() { return y+6*size/2; } ); // HtmlView Page linking property 'Y' for element 'bottomposition'
        //  _view.bottomresize.linkProperty("X",  function() { return bottomdragmesize; }, function(_v) { bottomdragmesize = _v; } ); // HtmlView Page linking property 'X' for element 'bottomresize'
          _view.bottomresize.linkProperty("Y",  function() { return y; }, function(_v) { y = _v; } ); // HtmlView Page linking property 'Y' for element 'bottomresize'
          _view.bottomresize.setAction("OnDrag", function(_data,_info) {
  dragemetrue2=true;
  w2 = bottomdragmesize-(-w*2+size);
  if(d<w2 && y<0.75*size) { // right side stop
    w2=d;
    bottomdragmesize = w2+(-w*2+size);
    }
    else if ( w2<=0){
    //bottomdragmesize =  w2+(-w*2+size);
    w2=0;
    bottomdragmesize = 0+ (-w*2+size);
      }
    
  else if(y<=size2) {
    w2=Math.min(d,w2);
  // w2=Math.min(d,bottomdragmesize-(-w*2+size));
  }

}); // HtmlView Page setting action 'OnDrag' for element 'bottomresize'
          _view.arrowdragme2.linkProperty("SizeX",  function() { return bottomdragmesize-dragmex; } ); // HtmlView Page linking property 'SizeX' for element 'arrowdragme2'
          _view.arrowdragme2.linkProperty("X",  function() { return dragmex; }, function(_v) { dragmex = _v; } ); // HtmlView Page linking property 'X' for element 'arrowdragme2'
          _view.arrowdragme2.linkProperty("Y",  function() { return dragmey; }, function(_v) { dragmey = _v; } ); // HtmlView Page linking property 'Y' for element 'arrowdragme2'
          _view.arrowdragme2.linkProperty("Visibility",  function() { return dragemetrue2===false; } ); // HtmlView Page linking property 'Visibility' for element 'arrowdragme2'
          _view.arrowdragme2.linkProperty("SizeY",  function() { return y-dragmey; } ); // HtmlView Page linking property 'SizeY' for element 'arrowdragme2'
          _view.dragme2.linkProperty("X",  function() { return dragmex; }, function(_v) { dragmex = _v; } ); // HtmlView Page linking property 'X' for element 'dragme2'
          _view.dragme2.linkProperty("Y",  function() { return dragmey; }, function(_v) { dragmey = _v; } ); // HtmlView Page linking property 'Y' for element 'dragme2'
          _view.dragme2.linkProperty("Visibility",  function() { return (dragemetrue2===false); } ); // HtmlView Page linking property 'Visibility' for element 'dragme2'
          _view.dragme2.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'dragme2'
          _view.yellowruler2.linkProperty("SizeX",  function() { return xmax; }, function(_v) { xmax = _v; } ); // HtmlView Page linking property 'SizeX' for element 'yellowruler2'
          _view.yellowruler2.linkProperty("X",  function() { return x1; }, function(_v) { x1 = _v; } ); // HtmlView Page linking property 'X' for element 'yellowruler2'
          _view.yellowruler2.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'yellowruler2'
          _view.yellowruler2.linkProperty("SizeY",  function() { return 6*size; } ); // HtmlView Page linking property 'SizeY' for element 'yellowruler2'
          _view.yellowruler.linkProperty("SizeX",  function() { return xmax; }, function(_v) { xmax = _v; } ); // HtmlView Page linking property 'SizeX' for element 'yellowruler'
          _view.yellowruler.linkProperty("X",  function() { return x1; }, function(_v) { x1 = _v; } ); // HtmlView Page linking property 'X' for element 'yellowruler'
          _view.yellowruler.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'yellowruler'
          _view.yellowruler.linkProperty("SizeY",  function() { return 6*size; } ); // HtmlView Page linking property 'SizeY' for element 'yellowruler'
          _view.arrowSet.linkProperty("NumberOfElements",  function() { return n; }, function(_v) { n = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'arrowSet'
          _view.arrowSet.linkProperty("SizeX",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'SizeX' for element 'arrowSet'
          _view.arrowSet.linkProperty("X",  function() { return xv; }, function(_v) { xv = _v; } ); // HtmlView Page linking property 'X' for element 'arrowSet'
          _view.arrowSet.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'arrowSet'
          _view.arrowSet.linkProperty("SizeY",  function() { return yv; }, function(_v) { yv = _v; } ); // HtmlView Page linking property 'SizeY' for element 'arrowSet'
          _view.horizontalline.linkProperty("SizeX",  function() { return xmax; }, function(_v) { xmax = _v; } ); // HtmlView Page linking property 'SizeX' for element 'horizontalline'
          _view.horizontalline.linkProperty("X",  function() { return x1; }, function(_v) { x1 = _v; } ); // HtmlView Page linking property 'X' for element 'horizontalline'
          _view.horizontalline.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'horizontalline'
          _view.textSetnumbersonmainscale.linkProperty("NumberOfElements",  function() { return n2; }, function(_v) { n2 = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'textSetnumbersonmainscale'
          _view.textSetnumbersonmainscale.linkProperty("X",  function() { return tx; }, function(_v) { tx = _v; } ); // HtmlView Page linking property 'X' for element 'textSetnumbersonmainscale'
          _view.textSetnumbersonmainscale.linkProperty("Y",  function() { return 2*size; } ); // HtmlView Page linking property 'Y' for element 'textSetnumbersonmainscale'
          _view.textSetnumbersonmainscale.linkProperty("Text",  function() { return txt; }, function(_v) { txt = _v; } ); // HtmlView Page linking property 'Text' for element 'textSetnumbersonmainscale'
          _view.textSetnumbersonmainscale.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'textSetnumbersonmainscale'
          _view.hintred3.linkProperty("X",  function() { return dx*2*integerd2+xi; } ); // HtmlView Page linking property 'X' for element 'hintred3'
          _view.hintred3.linkProperty("Y",  function() { return h*2; } ); // HtmlView Page linking property 'Y' for element 'hintred3'
          _view.hintred3.linkProperty("Text",  function() { return l_integerd2; }, function(_v) { l_integerd2 = _v; } ); // HtmlView Page linking property 'Text' for element 'hintred3'
          _view.hintred3.linkProperty("Visibility",  function() { return showhint&&show2; } ); // HtmlView Page linking property 'Visibility' for element 'hintred3'
          _view.hintred3.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'hintred3'
          _view.hintred.linkProperty("X",  function() { return dx*integerd*2+xi; } ); // HtmlView Page linking property 'X' for element 'hintred'
          _view.hintred.linkProperty("Y",  function() { return h*2; } ); // HtmlView Page linking property 'Y' for element 'hintred'
          _view.hintred.linkProperty("Text",  function() { return l_integerd; }, function(_v) { l_integerd = _v; } ); // HtmlView Page linking property 'Text' for element 'hintred'
          _view.hintred.linkProperty("Visibility",  function() { return showhint&&show; } ); // HtmlView Page linking property 'Visibility' for element 'hintred'
          _view.hintred.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'hintred'
          _view.hintred22.linkProperty("X",  function() { return dx*2*integerd2+xi; } ); // HtmlView Page linking property 'X' for element 'hintred22'
          _view.hintred22.linkProperty("Y",  function() { return h*2; } ); // HtmlView Page linking property 'Y' for element 'hintred22'
          _view.hintred22.linkProperty("Visibility",  function() { return showhint&&show2; } ); // HtmlView Page linking property 'Visibility' for element 'hintred22'
          _view.hintred22.linkProperty("SizeY",  function() { return -2*h; } ); // HtmlView Page linking property 'SizeY' for element 'hintred22'
          _view.hintred2.linkProperty("X",  function() { return dx*integerd*2+xi; } ); // HtmlView Page linking property 'X' for element 'hintred2'
          _view.hintred2.linkProperty("Y",  function() { return h*2; } ); // HtmlView Page linking property 'Y' for element 'hintred2'
          _view.hintred2.linkProperty("Visibility",  function() { return showhint&&show; } ); // HtmlView Page linking property 'Visibility' for element 'hintred2'
          _view.hintred2.linkProperty("SizeY",  function() { return -2*h; } ); // HtmlView Page linking property 'SizeY' for element 'hintred2'
          _view.polygon2.linkProperty("Points",  function() { return xpolygon; }, function(_v) { xpolygon = _v; } ); // HtmlView Page linking property 'Points' for element 'polygon2'
          _view.polygon2.setAction("OnExit", function(_data,_info) {
  _pause();

}); // HtmlView Page setting action 'OnExit' for element 'polygon2'
          _view.polygon2.linkProperty("X",  function() { return xi+d; } ); // HtmlView Page linking property 'X' for element 'polygon2'
          _view.polygon2.setAction("OnDrag", function(_data,_info) {
  dragemetrue=true;
  //d = ddragme - xi-1.5*h;
  if(y<size2 && d<w2){ //hit object left
    d=w2;
  //ddragme = xi+w2+1.5*h;
  }
  else if(-w*2+1.5*size2-1>=-0.75*size-L){ //hit left end 1 added arbitrary to prevent sticking
  //ddragme = xi+0+1.5*h;
  d=  0;
  }
  else if (d>=w*1.8){
    d =w*1.8;
  //  ddragme = xi+w*1.8+1.5*h;
    }
  L=L0-d;
  //_play();
  if ((mx<xi+d+3*h&&mx>xi+d+0&&my<h2&&my>-h2)||(mx<xi+d+3*h+h&&mx>xi+d+3*h&&my<h/2&&my>-h/2))
  {
    test = 1;
  if (my>mys) d = d-step/4; // move up
  if (my<mys) d = d+step/4; // move down
  d=Math.max(0,d);
  d=Math.min(160,d);
  if(y<size2 && d<w2)d=w2; // move the darkgreen
  L=L0-d; // move the darkgreen
  }
  test = 0;

}); // HtmlView Page setting action 'OnDrag' for element 'polygon2'
          _view.polygon_dragworkinghere.setAction("OnRelease", function(_data,_info) {
  if (ds-d>0) 
  {
    direction=1;
    }
    
    else if (ds-d<0) 
    {
      direction=-1;
      }

}); // HtmlView Page setting action 'OnRelease' for element 'polygon_dragworkinghere'
          _view.polygon_dragworkinghere.linkProperty("Points",  function() { return xpolygondrag; }, function(_v) { xpolygondrag = _v; } ); // HtmlView Page linking property 'Points' for element 'polygon_dragworkinghere'
          _view.polygon_dragworkinghere.linkProperty("X",  function() { return d; }, function(_v) { d = _v; } ); // HtmlView Page linking property 'X' for element 'polygon_dragworkinghere'
          _view.polygon_dragworkinghere.setAction("OnPress", function(_data,_info) {
  if (_isPlaying==true) _pause();
  else if(_isPaused==true) _play();
  ds = d; // for release velocity effect;

}); // HtmlView Page setting action 'OnPress' for element 'polygon_dragworkinghere'
          _view.polygon_dragworkinghere.setAction("OnDrag", function(_data,_info) {
  dragemetrue=true;
  //d = ddragme - xi-1.5*h;
  if(y<size2 && d<w2){ //hit object left
    d=w2;
  //ddragme = xi+w2+1.5*h;
  }
  else if(-w*2+1.5*size2-1>=-0.75*size-L){ //hit left end 1 added arbitrary to prevent sticking
  //ddragme = xi+0+1.5*h;
  d=  0;
  }
  else if (d>=w*1.8){
    d =w*1.8;
  //  ddragme = xi+w*1.8+1.5*h;
    }
  L=L0-d;
  //_play();
  if ((mx<xi+d+3*h&&mx>xi+d+0&&my<h2&&my>-h2)||(mx<xi+d+3*h+h&&mx>xi+d+3*h&&my<h/2&&my>-h/2))
  {
    test = 1;
  if (my>mys) d = d-step/4; // move up
  if (my<mys) d = d+step/4; // move down
  d=Math.max(0,d);
  d=Math.min(160,d);
  if(y<size2 && d<w2)d=w2; // move the darkgreen
  L=L0-d; // move the darkgreen
  }
  test = 0;
  
  var ds=d;
  var vs = (ds-d)/dt;
  if (vs<0) direction=1;
  else if(vs>0)direction=-1;

}); // HtmlView Page setting action 'OnDrag' for element 'polygon_dragworkinghere'
          _view.polygon_dragworkinghere.linkProperty("EnabledPosition",  function() { return lock?"ENABLED_NO_MOVE":"ENABLED_X"; } ); // HtmlView Page linking property 'EnabledPosition' for element 'polygon_dragworkinghere'
          _view.SVG23.linkProperty("SizeX",  function() { return 3.5*h; } ); // HtmlView Page linking property 'SizeX' for element 'SVG23'
          _view.SVG23.linkProperty("X",  function() { return xi+d+0.5*h; } ); // HtmlView Page linking property 'X' for element 'SVG23'
          _view.SVG23.linkProperty("SizeY",  function() { return h2*2; } ); // HtmlView Page linking property 'SizeY' for element 'SVG23'
          _view.SVG23.setAction("OnDrag", function(_data,_info) {
  dragemetrue=true;
  //d = ddragme - xi-1.5*h;
  if(y<size2 && d<w2){ //hit object left
    d=w2;
  //ddragme = xi+w2+1.5*h;
  }
  else if(-w*2+1.5*size2-1>=-0.75*size-L){ //hit left end 1 added arbitrary to prevent sticking
  //ddragme = xi+0+1.5*h;
  d=  0;
  }
  else if (d>=w*1.8){
    d =w*1.8;
  //  ddragme = xi+w*1.8+1.5*h;
    }
  L=L0-d;
  //_play();
  if ((mx<xi+d+3*h&&mx>xi+d+0&&my<h2&&my>-h2)||(mx<xi+d+3*h+h&&mx>xi+d+3*h&&my<h/2&&my>-h/2))
  {
    test = 1;
  if (my>mys) d = d-step/4; // move up
  if (my<mys) d = d+step/4; // move down
  d=Math.max(0,d);
  d=Math.min(160,d);
  if(y<size2 && d<w2)d=w2; // move the darkgreen
  L=L0-d; // move the darkgreen
  }
  test = 0;
;

}); // HtmlView Page setting action 'OnDrag' for element 'SVG23'
          _view.SVGwhiteboard_to_bend_with.linkProperty("SizeX",  function() { return 5.5*h; } ); // HtmlView Page linking property 'SizeX' for element 'SVGwhiteboard_to_bend_with'
          _view.SVGwhiteboard_to_bend_with.linkProperty("X",  function() { return xi+d+2.5*h; } ); // HtmlView Page linking property 'X' for element 'SVGwhiteboard_to_bend_with'
          _view.SVGwhiteboard_to_bend_with.linkProperty("SizeY",  function() { return h2*2; } ); // HtmlView Page linking property 'SizeY' for element 'SVGwhiteboard_to_bend_with'
          _view.image.linkProperty("SizeX",  function() { return 1.5*h; } ); // HtmlView Page linking property 'SizeX' for element 'image'
          _view.image.linkProperty("X",  function() { return xi+d+2.5*h; } ); // HtmlView Page linking property 'X' for element 'image'
          _view.image.linkProperty("SizeY",  function() { return h2*2.1; } ); // HtmlView Page linking property 'SizeY' for element 'image'
          _view.rough2.linkProperty("SizeX",  function() { return size/8; } ); // HtmlView Page linking property 'SizeX' for element 'rough2'
          _view.rough2.linkProperty("X",  function() { return ddragme; }, function(_v) { ddragme = _v; } ); // HtmlView Page linking property 'X' for element 'rough2'
          _view.rough2.linkProperty("SizeY",  function() { return h2*2; } ); // HtmlView Page linking property 'SizeY' for element 'rough2'
          _view.rough.linkProperty("SizeX",  function() { return size/8; } ); // HtmlView Page linking property 'SizeX' for element 'rough'
          _view.rough.linkProperty("X",  function() { return 3*h+xi+d; } ); // HtmlView Page linking property 'X' for element 'rough'
          _view.rough.linkProperty("SizeY",  function() { return h2*2; } ); // HtmlView Page linking property 'SizeY' for element 'rough'
          _view.reposition3.linkProperty("X",  function() { return d; }, function(_v) { d = _v; } ); // HtmlView Page linking property 'X' for element 'reposition3'
          _view.reposition3.setAction("OnEnter", function(_data,_info) {
  if (d >=160||d<=0){
    direction=+1;
  }
  if (firsttime==true&&_isPaused){
  alerttext= "micrometer is playing";
  //alert("micrometer is playing");
   EJSS_INTERFACE.BoxPanel.showOkDialog("micrometer is playing");
   //document.getElementById(".myBoxPanelOk").style.top = "0px";
  _play();
  firsttime=false;
  }

}); // HtmlView Page setting action 'OnEnter' for element 'reposition3'
          _view.reposition3.setAction("OnDrag", function(_data,_info) {
  dragemetrue=true;
  //d = ddragme - xi-1.5*h;
  if(y<size2 && d<w2){ //hit object left
    d=w2;
  //ddragme = xi+w2+1.5*h;
  }
  else if(-w*2+1.5*size2-1>=-0.75*size-L){ //hit left end 1 added arbitrary to prevent sticking
  //ddragme = xi+0+1.5*h;
  d=  0;
  }
  else if (d>=w*1.8){
    d =w*1.8;
  //  ddragme = xi+w*1.8+1.5*h;
    }
  L=L0-d;

}); // HtmlView Page setting action 'OnDrag' for element 'reposition3'
          _view.reposition3.linkProperty("EnabledPosition",  function() { return lock?"NONE":"ENABLED_X"; } ); // HtmlView Page linking property 'EnabledPosition' for element 'reposition3'
          _view.arrowdragme.linkProperty("SizeX",  function() { return d+30-dragmex; } ); // HtmlView Page linking property 'SizeX' for element 'arrowdragme'
          _view.arrowdragme.linkProperty("X",  function() { return dragmex; }, function(_v) { dragmex = _v; } ); // HtmlView Page linking property 'X' for element 'arrowdragme'
          _view.arrowdragme.linkProperty("Y",  function() { return dragmey; }, function(_v) { dragmey = _v; } ); // HtmlView Page linking property 'Y' for element 'arrowdragme'
          _view.arrowdragme.linkProperty("Visibility",  function() { return dragemetrue===false; } ); // HtmlView Page linking property 'Visibility' for element 'arrowdragme'
          _view.arrowdragme.linkProperty("SizeY",  function() { return 0-dragmey; } ); // HtmlView Page linking property 'SizeY' for element 'arrowdragme'
          _view.dragme.linkProperty("X",  function() { return dragmex; }, function(_v) { dragmex = _v; } ); // HtmlView Page linking property 'X' for element 'dragme'
          _view.dragme.linkProperty("Y",  function() { return dragmey; }, function(_v) { dragmey = _v; } ); // HtmlView Page linking property 'Y' for element 'dragme'
          _view.dragme.linkProperty("Visibility",  function() { return (dragemetrue===false); } ); // HtmlView Page linking property 'Visibility' for element 'dragme'
          _view.dragme.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'dragme'
          _view.textSet2.linkProperty("NumberOfElements",  function() { return tc; }, function(_v) { tc = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'textSet2'
          _view.textSet2.linkProperty("X",  function() { return xzero+2*size; } ); // HtmlView Page linking property 'X' for element 'textSet2'
          _view.textSet2.linkProperty("Y",  function() { return yt; }, function(_v) { yt = _v; } ); // HtmlView Page linking property 'Y' for element 'textSet2'
          _view.textSet2.linkProperty("Text",  function() { return txty; }, function(_v) { txty = _v; } ); // HtmlView Page linking property 'Text' for element 'textSet2'
          _view.textSet2.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'textSet2'
          _view.shorthorizontalline.linkProperty("NumberOfElements",  function() { return n3; }, function(_v) { n3 = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'shorthorizontalline'
          _view.shorthorizontalline.linkProperty("SizeX",  function() { return hdx; }, function(_v) { hdx = _v; } ); // HtmlView Page linking property 'SizeX' for element 'shorthorizontalline'
          _view.shorthorizontalline.linkProperty("X",  function() { return xzero; }, function(_v) { xzero = _v; } ); // HtmlView Page linking property 'X' for element 'shorthorizontalline'
          _view.shorthorizontalline.linkProperty("Y",  function() { return hy; }, function(_v) { hy = _v; } ); // HtmlView Page linking property 'Y' for element 'shorthorizontalline'
          _view.shorthorizontalline.linkProperty("SizeY",  function() { return hdy; }, function(_v) { hdy = _v; } ); // HtmlView Page linking property 'SizeY' for element 'shorthorizontalline'
          _view.graduatemarksblue.linkProperty("NumberOfElements",  function() { return n3; }, function(_v) { n3 = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'graduatemarksblue'
          _view.graduatemarksblue.linkProperty("SizeX",  function() { return hdx; }, function(_v) { hdx = _v; } ); // HtmlView Page linking property 'SizeX' for element 'graduatemarksblue'
          _view.graduatemarksblue.linkProperty("X",  function() { return xzero+7*size+h; } ); // HtmlView Page linking property 'X' for element 'graduatemarksblue'
          _view.graduatemarksblue.linkProperty("Y",  function() { return hythread; }, function(_v) { hythread = _v; } ); // HtmlView Page linking property 'Y' for element 'graduatemarksblue'
          _view.graduatemarksblue.linkProperty("SizeY",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'SizeY' for element 'graduatemarksblue'
          _view.graduatemarksbluelonger.linkProperty("NumberOfElements",  function() { return n3; }, function(_v) { n3 = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'graduatemarksbluelonger'
          _view.graduatemarksbluelonger.linkProperty("SizeX",  function() { return hdxthread; }, function(_v) { hdxthread = _v; } ); // HtmlView Page linking property 'SizeX' for element 'graduatemarksbluelonger'
          _view.graduatemarksbluelonger.linkProperty("X",  function() { return xzero+7*size+h; } ); // HtmlView Page linking property 'X' for element 'graduatemarksbluelonger'
          _view.graduatemarksbluelonger.linkProperty("Y",  function() { return hythread; }, function(_v) { hythread = _v; } ); // HtmlView Page linking property 'Y' for element 'graduatemarksbluelonger'
          _view.graduatemarksbluelonger.linkProperty("SizeY",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'SizeY' for element 'graduatemarksbluelonger'
          _view.horitontalguide2.linkProperty("SizeX",  function() { return -xi*2; } ); // HtmlView Page linking property 'SizeX' for element 'horitontalguide2'
          _view.horitontalguide2.linkProperty("X",  function() { return xi+d+2*xi; } ); // HtmlView Page linking property 'X' for element 'horitontalguide2'
          _view.horitontalguide2.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'horitontalguide2'
          _view.horitontalguide2.linkProperty("Visibility",  function() { return showhint&&(show||show2); } ); // HtmlView Page linking property 'Visibility' for element 'horitontalguide2'
          _view.verticalguide.linkProperty("X",  function() { return xi+d+2*xi; } ); // HtmlView Page linking property 'X' for element 'verticalguide'
          _view.verticalguide.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'verticalguide'
          _view.verticalguide.linkProperty("Visibility",  function() { return showhint&&(show||show2); } ); // HtmlView Page linking property 'Visibility' for element 'verticalguide'
          _view.verticalguide.linkProperty("SizeY",  function() { return -size*6; } ); // HtmlView Page linking property 'SizeY' for element 'verticalguide'
          _view.text2.linkProperty("X",  function() { return xi+d+2*xi; } ); // HtmlView Page linking property 'X' for element 'text2'
          _view.text2.linkProperty("Y",  function() { return -size*6; } ); // HtmlView Page linking property 'Y' for element 'text2'
          _view.text2.linkProperty("Text",  function() { return l_decimald2; }, function(_v) { l_decimald2 = _v; } ); // HtmlView Page linking property 'Text' for element 'text2'
          _view.text2.linkProperty("Visibility",  function() { return showhint&&show2; } ); // HtmlView Page linking property 'Visibility' for element 'text2'
          _view.text2.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'text2'
          _view.text.linkProperty("X",  function() { return xi+d+2*xi; } ); // HtmlView Page linking property 'X' for element 'text'
          _view.text.linkProperty("Y",  function() { return -size*6; } ); // HtmlView Page linking property 'Y' for element 'text'
          _view.text.linkProperty("Text",  function() { return l_decimald; }, function(_v) { l_decimald = _v; } ); // HtmlView Page linking property 'Text' for element 'text'
          _view.text.linkProperty("Visibility",  function() { return showhint&&show; } ); // HtmlView Page linking property 'Visibility' for element 'text'
          _view.text.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'text'
          _view.rodgreen22.linkProperty("SizeX",  function() { return L; }, function(_v) { L = _v; } ); // HtmlView Page linking property 'SizeX' for element 'rodgreen22'
          _view.rodgreen22.linkProperty("X",  function() { return -0.75*size; } ); // HtmlView Page linking property 'X' for element 'rodgreen22'
          _view.rodgreen22.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'rodgreen22'
          _view.rodgreen22.linkProperty("SizeY",  function() { return size*1.5; } ); // HtmlView Page linking property 'SizeY' for element 'rodgreen22'
          _view.rodgreen2.linkProperty("SizeX",  function() { return L; }, function(_v) { L = _v; } ); // HtmlView Page linking property 'SizeX' for element 'rodgreen2'
          _view.rodgreen2.linkProperty("X",  function() { return -0.75*size; } ); // HtmlView Page linking property 'X' for element 'rodgreen2'
          _view.rodgreen2.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'rodgreen2'
          _view.rodgreen2.linkProperty("SizeY",  function() { return size*1.5; } ); // HtmlView Page linking property 'SizeY' for element 'rodgreen2'
          _view.rodgreentip.linkProperty("SizeX",  function() { return +size/2; } ); // HtmlView Page linking property 'SizeX' for element 'rodgreentip'
          _view.rodgreentip.linkProperty("X",  function() { return -0.73*size-L; } ); // HtmlView Page linking property 'X' for element 'rodgreentip'
          _view.rodgreentip.linkProperty("Y",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'Y' for element 'rodgreentip'
          _view.rodgreentip.linkProperty("SizeY",  function() { return size*1.5; } ); // HtmlView Page linking property 'SizeY' for element 'rodgreentip'
          _view.rachetteteal.linkProperty("SizeX",  function() { return h; }, function(_v) { h = _v; } ); // HtmlView Page linking property 'SizeX' for element 'rachetteteal'
          _view.rachetteteal.linkProperty("X",  function() { return xi+d+4*h; } ); // HtmlView Page linking property 'X' for element 'rachetteteal'
          _view.rachetteteal.linkProperty("SizeY",  function() { return h; }, function(_v) { h = _v; } ); // HtmlView Page linking property 'SizeY' for element 'rachetteteal'
          _view.image2.linkProperty("SizeX",  function() { return h; }, function(_v) { h = _v; } ); // HtmlView Page linking property 'SizeX' for element 'image2'
          _view.image2.linkProperty("X",  function() { return xi+d+4*h; } ); // HtmlView Page linking property 'X' for element 'image2'
          _view.image2.setAction("OnPress", function(_data,_info) {
  if (_isPlaying==true) _pause();
  else if(_isPaused==true) _play();

}); // HtmlView Page setting action 'OnPress' for element 'image2'
          _view.image2.linkProperty("SizeY",  function() { return h; }, function(_v) { h = _v; } ); // HtmlView Page linking property 'SizeY' for element 'image2'
          _view.rough222.linkProperty("SizeX",  function() { return size/8; } ); // HtmlView Page linking property 'SizeX' for element 'rough222'
          _view.rough222.linkProperty("X",  function() { return xzero+10*size+h; } ); // HtmlView Page linking property 'X' for element 'rough222'
          _view.rough222.linkProperty("SizeY",  function() { return h; }, function(_v) { h = _v; } ); // HtmlView Page linking property 'SizeY' for element 'rough222'
          _view.rough22.linkProperty("SizeX",  function() { return size/8; } ); // HtmlView Page linking property 'SizeX' for element 'rough22'
          _view.rough22.linkProperty("X",  function() { return xzero+10*size+size*1.5+h; } ); // HtmlView Page linking property 'X' for element 'rough22'
          _view.rough22.linkProperty("SizeY",  function() { return h; }, function(_v) { h = _v; } ); // HtmlView Page linking property 'SizeY' for element 'rough22'
          _view.graduatemarksrat.linkProperty("NumberOfElements",  function() { return n3; }, function(_v) { n3 = _v; } ); // HtmlView Page linking property 'NumberOfElements' for element 'graduatemarksrat'
          _view.graduatemarksrat.linkProperty("SizeX",  function() { return hdx; }, function(_v) { hdx = _v; } ); // HtmlView Page linking property 'SizeX' for element 'graduatemarksrat'
          _view.graduatemarksrat.linkProperty("X",  function() { return xzero+10*size+h; } ); // HtmlView Page linking property 'X' for element 'graduatemarksrat'
          _view.graduatemarksrat.linkProperty("Y",  function() { return hythreadrachet; }, function(_v) { hythreadrachet = _v; } ); // HtmlView Page linking property 'Y' for element 'graduatemarksrat'
          _view.graduatemarksrat.linkProperty("SizeY",  function() { return zero; }, function(_v) { zero = _v; } ); // HtmlView Page linking property 'SizeY' for element 'graduatemarksrat'
          _view.ospsg.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'ospsg'
          _view.unlock22.linkProperty("Visibility",  function() { return !lock; } ); // HtmlView Page linking property 'Visibility' for element 'unlock22'
          _view.rod2.linkProperty("Transformation",  function() { return -pi/4; } ); // HtmlView Page linking property 'Transformation' for element 'rod2'
          _view.rod2.linkProperty("SizeX",  function() { return size/5*size; } ); // HtmlView Page linking property 'SizeX' for element 'rod2'
          _view.rod2.setAction("OnPress", function(_data,_info) {
  lock=true;

}); // HtmlView Page setting action 'OnPress' for element 'rod2'
          _view.rod2.linkProperty("SizeY",  function() { return size/20*size; } ); // HtmlView Page linking property 'SizeY' for element 'rod2'
          _view.circle2.linkProperty("SizeX",  function() { return size*size/7; } ); // HtmlView Page linking property 'SizeX' for element 'circle2'
          _view.circle2.setAction("OnPress", function(_data,_info) {
  //lock ();
  lock=true;

}); // HtmlView Page setting action 'OnPress' for element 'circle2'
          _view.circle2.linkProperty("SizeY",  function() { return size*size/7; } ); // HtmlView Page linking property 'SizeY' for element 'circle2'
          _view.circle23.linkProperty("SizeX",  function() { return size*size/14; } ); // HtmlView Page linking property 'SizeX' for element 'circle23'
          _view.circle23.setAction("OnPress", function(_data,_info) {
  lock ();

}); // HtmlView Page setting action 'OnPress' for element 'circle23'
          _view.circle23.linkProperty("SizeY",  function() { return size*size/14; } ); // HtmlView Page linking property 'SizeY' for element 'circle23'
          _view.circle22.linkProperty("SizeX",  function() { return size*size/21; } ); // HtmlView Page linking property 'SizeX' for element 'circle22'
          _view.circle22.setAction("OnPress", function(_data,_info) {
  //lock ();
  lock=true;
  alert("lock="+lock);

}); // HtmlView Page setting action 'OnPress' for element 'circle22'
          _view.circle22.linkProperty("SizeY",  function() { return size*size/21; } ); // HtmlView Page linking property 'SizeY' for element 'circle22'
          _view.lock.linkProperty("Visibility",  function() { return lock; }, function(_v) { lock = _v; } ); // HtmlView Page linking property 'Visibility' for element 'lock'
          _view.rod22.linkProperty("Transformation",  function() { return -3*pi/4; } ); // HtmlView Page linking property 'Transformation' for element 'rod22'
          _view.rod22.linkProperty("SizeX",  function() { return size/5*size; } ); // HtmlView Page linking property 'SizeX' for element 'rod22'
          _view.rod22.setAction("OnPress", function(_data,_info) {
  lock=false;

}); // HtmlView Page setting action 'OnPress' for element 'rod22'
          _view.rod22.linkProperty("SizeY",  function() { return size/20*size; } ); // HtmlView Page linking property 'SizeY' for element 'rod22'
          _view.circle24.linkProperty("SizeX",  function() { return size*size/7; } ); // HtmlView Page linking property 'SizeX' for element 'circle24'
          _view.circle24.setAction("OnPress", function(_data,_info) {
  lock=false;

}); // HtmlView Page setting action 'OnPress' for element 'circle24'
          _view.circle24.linkProperty("SizeY",  function() { return size*size/7; } ); // HtmlView Page linking property 'SizeY' for element 'circle24'
          _view.circle232.linkProperty("SizeX",  function() { return size*size/14; } ); // HtmlView Page linking property 'SizeX' for element 'circle232'
          _view.circle232.setAction("OnPress", function(_data,_info) {
  lock=false;

}); // HtmlView Page setting action 'OnPress' for element 'circle232'
          _view.circle232.linkProperty("SizeY",  function() { return size*size/14; } ); // HtmlView Page linking property 'SizeY' for element 'circle232'
          _view.circle222.linkProperty("SizeX",  function() { return size*size/21; } ); // HtmlView Page linking property 'SizeX' for element 'circle222'
          _view.circle222.setAction("OnPress", function(_data,_info) {
  //lock ();
  lock=false;
  alert("lock="+lock);

}); // HtmlView Page setting action 'OnPress' for element 'circle222'
          _view.circle222.linkProperty("SizeY",  function() { return size*size/21; } ); // HtmlView Page linking property 'SizeY' for element 'circle222'
          _view.step.linkProperty("X",  function() { return d+30; } ); // HtmlView Page linking property 'X' for element 'step'
          _view.image3.linkProperty("X",  function() { return -direction*3; } ); // HtmlView Page linking property 'X' for element 'image3'
          _view.arrow2.setAction("OnPress", function(_data,_info) {
  direction=1;
  _step();

}); // HtmlView Page setting action 'OnPress' for element 'arrow2'
          _view.arrow.setAction("OnPress", function(_data,_info) {
  direction=-1;
  _step();

}); // HtmlView Page setting action 'OnPress' for element 'arrow'
          _view.answer.linkProperty("FillColor",  function() { return K1fcorrectbackground; }, function(_v) { K1fcorrectbackground = _v; } ); // HtmlView Page linking property 'FillColor' for element 'answer'
          _view.answer.linkProperty("Y",  function() { return size*5; } ); // HtmlView Page linking property 'Y' for element 'answer'
          _view.answer.linkProperty("Text",  function() { return K1fcorrect; }, function(_v) { K1fcorrect = _v; } ); // HtmlView Page linking property 'Text' for element 'answer'
          _view.answer.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'answer'
          _view.mytext.linkProperty("Y",  function() { return ymax/2; } ); // HtmlView Page linking property 'Y' for element 'mytext'
          _view.mytext.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'mytext'
          _view.dragdot.linkProperty("X",  function() { return d; }, function(_v) { d = _v; } ); // HtmlView Page linking property 'X' for element 'dragdot'
          _view.dragdot.setAction("OnDrag", function(_data,_info) {


}); // HtmlView Page setting action 'OnDrag' for element 'dragdot'
          _view.collate.setAction("OffClick", function(_data,_info) {
  _view.inputfield.getStyle().setDisplay("none");
  kheight=0.96;
  //_view.plottingPanel.getGraphics().setHeight(changeOrientation(0.95));

}); // HtmlView Page setting action 'OffClick' for element 'collate'
          _view.collate.setAction("OnClick", function(_data,_info) {
  _view.inputfield.getStyle().setDisplay("inline-flex");
  //changeOrientation(0.5);
  kheight=0.90;


}); // HtmlView Page setting action 'OnClick' for element 'collate'
          _view.comboBox3.linkProperty("Options",  function() { return ["on/off","hint off","hint show","answer show","answer2 show","answer off","lock","un lock"]; } ); // HtmlView Page linking property 'Options' for element 'comboBox3'
          _view.comboBox3.setAction("OnChange", function(_data,_info) {
  //option = _view.comboBox.getProperty("SelectedOptions");
  //alert(option);
  var opts = _view.comboBox3.getProperty("SelectedOptions");  // array of options
      var option = (opts.length > 0)? opts[0]:""; // selected option 
   if(option=="hint show") {
    showhint=true;
  show2=true;
    }
    else if(option=="hint off") {
    showhint=false;
  show2=false;
    }
    else if(option=="answer show") {
   
  show=true;
  show2=false;
    }
    else if(option=="answer off") {
    
  show=false;
  show2=false;
    }
    else if(option=="answer2 show") {
   show=false;
  show2=true;
    }
    else if(option=="answer2 off") {
    
  show2=false;
    }
   else if(option=="lock") {
  lock=true;
   }
   else if(option=="un lock") {
  lock=false;
   }
    else if(option=="z_err=-15") {
   error =-15; 
     }
      else if(option=="z_err=-14") {
   error =-14; 
     }
      else if(option=="z_err=-13") {
   error =-13; 
     }
      else if(option=="z_err=-12") {
   error =-12; 
     }
      else if(option=="z_err=-11") {
   error =-11; 
     }
   
   
   else if(option=="z_err=-10") {
   error =-10; 
     }
   else if(option=="z_err=-9") {
   error =-9; 
     }
     else if(option=="z_err=-8") {
   error =-8; 
     }
     else if(option=="z_err=-7") {
   error =-7; 
     }
     else if(option=="z_err=-6") {
   error =-6; 
     }
   else if(option=="z_err=-5") {
   error =-5; 
     }
   else if(option=="z_err=-4") {
   error =-4; 
     }
     else if(option=="z_err=-3") {
   error =-3; 
     }
     else if(option=="z_err=-2") {
   error =-2; 
     }
     else if(option=="z_err=-1") {
   error =-1; 
     }
     else if(option=="zero error=0") {
   error =0; 
     }
  else if(option=="z_err=15") {
   error =15; 
     }
      else if(option=="z_err=14") {
   error =14; 
     }
      else if(option=="z_err=13") {
   error =13; 
     }
      else if(option=="z_err=12") {
   error =12; 
     }
      else if(option=="z_err=11") {
   error =11; 
     }
   
   
   else if(option=="z_err=10") {
   error =10; 
     }
   else if(option=="z_err=9") {
   error =9; 
     }
     else if(option=="z_err=8") {
   error =8; 
     }
     else if(option=="z_err=7") {
   error =7; 
     }
     else if(option=="z_err=6") {
   error =6; 
     }
   else if(option=="z_err=5") {
   error =5; 
     }
   else if(option=="z_err=4") {
   error =4; 
     }
     else if(option=="z_err=3") {
   error =3; 
     }
     else if(option=="z_err=2") {
   error =2; 
     }
     else if(option=="z_err=1") {
   error =1; 
     }

}); // HtmlView Page setting action 'OnChange' for element 'comboBox3'
          _view.comboBox3.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'comboBox3'
          _view.comboBox.linkProperty("Options",  function() { return ["zero error=0","z_err=-15","z_err=-14","z_err=-13","z_err=-12","z_err=-11","z_err=-10","z_err=-9","z_err=-8","z_err=-7","z_err=-6","z_err=-5","z_err=-4","z_err=-3","z_err=-2","z_err=-1","","z_err=1","z_err=2","z_err=3","z_err=4","z_err=5","z_err=6","z_err=7","z_err=8","z_err=9","z_err=10","z_err=11","z_err=12","z_err=13","z_err=14","z_err=15"]; } ); // HtmlView Page linking property 'Options' for element 'comboBox'
          _view.comboBox.setAction("OnChange", function(_data,_info) {
  //option = _view.comboBox.getProperty("SelectedOptions");
  //alert(option);
  var opts = _view.comboBox.getProperty("SelectedOptions");  // array of options
      var option = (opts.length > 0)? opts[0]:""; // selected option 
   if(option=="hint show") {
    showhint=true;
  show2=true;
    }
    else if(option=="hint off") {
    showhint=false;
  show2=false;
    }
    else if(option=="answer show") {
   
  show=true;
  show2=false;
    }
    else if(option=="answer off") {
    
  show=false;
  show2=false;
    }
    else if(option=="answer2 show") {
   show=false;
  show2=true;
    }
    else if(option=="answer2 off") {
    
  show2=false;
    }
   else if(option=="lock") {
  lock=true;
   }
   else if(option=="un lock") {
  lock=false;
   }
    else if(option=="z_err=-15") {
   error =-15; 
     }
      else if(option=="z_err=-14") {
   error =-14; 
     }
      else if(option=="z_err=-13") {
   error =-13; 
     }
      else if(option=="z_err=-12") {
   error =-12; 
     }
      else if(option=="z_err=-11") {
   error =-11; 
     }
   
   
   else if(option=="z_err=-10") {
   error =-10; 
     }
   else if(option=="z_err=-9") {
   error =-9; 
     }
     else if(option=="z_err=-8") {
   error =-8; 
     }
     else if(option=="z_err=-7") {
   error =-7; 
     }
     else if(option=="z_err=-6") {
   error =-6; 
     }
   else if(option=="z_err=-5") {
   error =-5; 
     }
   else if(option=="z_err=-4") {
   error =-4; 
     }
     else if(option=="z_err=-3") {
   error =-3; 
     }
     else if(option=="z_err=-2") {
   error =-2; 
     }
     else if(option=="z_err=-1") {
   error =-1; 
     }
     else if(option=="zero error=0") {
   error =0; 
     }
  else if(option=="z_err=15") {
   error =15; 
     }
      else if(option=="z_err=14") {
   error =14; 
     }
      else if(option=="z_err=13") {
   error =13; 
     }
      else if(option=="z_err=12") {
   error =12; 
     }
      else if(option=="z_err=11") {
   error =11; 
     }
   
   
   else if(option=="z_err=10") {
   error =10; 
     }
   else if(option=="z_err=9") {
   error =9; 
     }
     else if(option=="z_err=8") {
   error =8; 
     }
     else if(option=="z_err=7") {
   error =7; 
     }
     else if(option=="z_err=6") {
   error =6; 
     }
   else if(option=="z_err=5") {
   error =5; 
     }
   else if(option=="z_err=4") {
   error =4; 
     }
     else if(option=="z_err=3") {
   error =3; 
     }
     else if(option=="z_err=2") {
   error =2; 
     }
     else if(option=="z_err=1") {
   error =1; 
     }
  //if (!_isMobile){
    /*
    if(parent.cordova) { // check it is running in Android
  //var option1 = _view.comboBox.getProperty("SelectedOptions");
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
  //}

}); // HtmlView Page setting action 'OnChange' for element 'comboBox'
          _view.comboBox.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'comboBox'
          _view.playPauseButton.setAction("OffClick", function(_data,_info) {
  text="paused, 2 rounds = 100 divisions = 1.00 mm";
  _pause();
  alerttext="micrometer is paused";

}); // HtmlView Page setting action 'OffClick' for element 'playPauseButton'
          _view.playPauseButton.linkProperty("State",  function() { return _isPaused; } ); // HtmlView Page linking property 'State' for element 'playPauseButton'
          _view.playPauseButton.linkProperty("Disabled",  function() { return lock; }, function(_v) { lock = _v; } ); // HtmlView Page linking property 'Disabled' for element 'playPauseButton'
          _view.playPauseButton.setAction("OnClick", function(_data,_info) {
  _play();
  alerttext="micrometer is playing";
  text="playing, 2 rounds = 100 divisions = 1.00 mm";

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
          _view.comboBox2.linkProperty("Options",  function() { return ["0.00","0.01","0.02","0.03","0.04","0.05","0.06","0.07","0.08","0.09","0.10","0.11","0.12","0.13","0.14","0.15","0.16","0.17","0.18","0.19","0.20","0.21","0.22","0.23","0.24","0.25","0.26","0.27","0.28","0.29","0.30","0.31","0.32","0.33","0.34","0.35","0.36","0.37","0.38","0.39","0.40","0.41","0.42","0.43","0.44","0.45","0.46","0.47","0.48","0.49","0.50","0.51","0.52","0.53","0.54","0.55","0.56","0.57","0.58","0.59","0.60","0.61","0.62","0.63","0.64","0.65","0.66","0.67","0.68","0.69","0.70","0.71","0.72","0.73","0.74","0.75","0.76","0.77","0.78","0.79","0.80","0.81","0.82","0.83","0.84","0.85","0.86","0.87","0.88","0.89","0.90","0.91","0.92","0.93","0.94","0.95","0.96","0.97","0.98","0.99","1.00","1.01","1.02","1.03","1.04","1.05","1.06","1.07","1.08","1.09","1.10","1.11","1.12","1.13","1.14","1.15","1.16","1.17","1.18","1.19","1.20","1.21","1.22","1.23","1.24","1.25","1.26","1.27","1.28","1.29","1.30","1.31","1.32","1.33","1.34","1.35","1.36","1.37","1.38","1.39","1.40","1.41","1.42","1.43","1.44","1.45","1.46","1.47","1.48","1.49","1.50","1.51","1.52","1.53","1.54","1.55","1.56","1.57","1.58","1.59","1.60","1.61","1.62","1.63","1.64","1.65","1.66","1.67","1.68","1.69","1.70","1.71","1.72","1.73","1.74","1.75","1.76","1.77","1.78","1.79","1.80","1.81","1.82","1.83","1.84","1.85","1.86","1.87","1.88","1.89","1.90","1.91","1.92","1.93","1.94","1.95","1.96","1.97","1.98","1.99","2.00","2.01","2.02","2.03","2.04","2.05","2.06","2.07","2.08","2.09","2.10","2.11","2.12","2.13","2.14","2.15","2.16","2.17","2.18","2.19","2.20","2.21","2.22","2.23","2.24","2.25","2.26","2.27","2.28","2.29","2.30","2.31","2.32","2.33","2.34","2.35","2.36","2.37","2.38","2.39","2.40","2.41","2.42","2.43","2.44","2.45","2.46","2.47","2.48","2.49","2.50","2.51","2.52","2.53","2.54","2.55","2.56","2.57","2.58","2.59","2.60","2.61","2.62","2.63","2.64","2.65","2.66","2.67","2.68","2.69","2.70","2.71","2.72","2.73","2.74","2.75","2.76","2.77","2.78","2.79","2.80","2.81","2.82","2.83","2.84","2.85","2.86","2.87","2.88","2.89","2.90","2.91","2.92","2.93","2.94","2.95","2.96","2.97","2.98","2.99","3.00","3.01","3.02","3.03","3.04","3.05","3.06","3.07","3.08","3.09","3.10","3.11","3.12","3.13","3.14","3.15","3.16","3.17","3.18","3.19","3.20","3.21","3.22","3.23","3.24","3.25","3.26","3.27","3.28","3.29","3.30","3.31","3.32","3.33","3.34","3.35","3.36","3.37","3.38","3.39","3.40","3.41","3.42","3.43","3.44","3.45","3.46","3.47","3.48","3.49","3.50","3.51","3.52","3.53","3.54","3.55","3.56","3.57","3.58","3.59","3.60","3.61","3.62","3.63","3.64","3.65","3.66","3.67","3.68","3.69","3.70","3.71","3.72","3.73","3.74","3.75","3.76","3.77","3.78","3.79","3.80","3.81","3.82","3.83","3.84","3.85","3.86","3.87","3.88","3.89","3.90","3.91","3.92","3.93","3.94","3.95","3.96","3.97","3.98","3.99","4.00","4.01","4.02","4.03","4.04","4.05","4.06","4.07","4.08","4.09","4.10","4.11","4.12","4.13","4.14","4.15","4.16","4.17","4.18","4.19","4.20","4.21","4.22","4.23","4.24","4.25","4.26","4.27","4.28","4.29","4.30","4.31","4.32","4.33","4.34","4.35","4.36","4.37","4.38","4.39","4.40","4.41","4.42","4.43","4.44","4.45","4.46","4.47","4.48","4.49","4.50","4.51","4.52","4.53","4.54","4.55","4.56","4.57","4.58","4.59","4.60","4.61","4.62","4.63","4.64","4.65","4.66","4.67","4.68","4.69","4.70","4.71","4.72","4.73","4.74","4.75","4.76","4.77","4.78","4.79","4.80","4.81","4.82","4.83","4.84","4.85","4.86","4.87","4.88","4.89","4.90","4.91","4.92","4.93","4.94","4.95","4.96","4.97","4.98","4.99","5.00","5.01","5.02","5.03","5.04","5.05","5.06","5.07","5.08","5.09","5.10","5.11","5.12","5.13","5.14","5.15","5.16","5.17","5.18","5.19","5.20","5.21","5.22","5.23","5.24","5.25","5.26","5.27","5.28","5.29","5.30","5.31","5.32","5.33","5.34","5.35","5.36","5.37","5.38","5.39","5.40","5.41","5.42","5.43","5.44","5.45","5.46","5.47","5.48","5.49","5.50","5.51","5.52","5.53","5.54","5.55","5.56","5.57","5.58","5.59","5.60","5.61","5.62","5.63","5.64","5.65","5.66","5.67","5.68","5.69","5.70","5.71","5.72","5.73","5.74","5.75","5.76","5.77","5.78","5.79","5.80","5.81","5.82","5.83","5.84","5.85","5.86","5.87","5.88","5.89","5.90","5.91","5.92","5.93","5.94","5.95","5.96","5.97","5.98","5.99","6.00","6.01","6.02","6.03","6.04","6.05","6.06","6.07","6.08","6.09","6.10","6.11","6.12","6.13","6.14","6.15","6.16","6.17","6.18","6.19","6.20","6.21","6.22","6.23","6.24","6.25","6.26","6.27","6.28","6.29","6.30","6.31","6.32","6.33","6.34","6.35","6.36","6.37","6.38","6.39","6.40","6.41","6.42","6.43","6.44","6.45","6.46","6.47","6.48","6.49","6.50","6.51","6.52","6.53","6.54","6.55","6.56","6.57","6.58","6.59","6.60","6.61","6.62","6.63","6.64","6.65","6.66","6.67","6.68","6.69","6.70","6.71","6.72","6.73","6.74","6.75","6.76","6.77","6.78","6.79","6.80","6.81","6.82","6.83","6.84","6.85","6.86","6.87","6.88","6.89","6.90","6.91","6.92","6.93","6.94","6.95","6.96","6.97","6.98","6.99","7.00","7.01","7.02","7.03","7.04","7.05","7.06","7.07","7.08","7.09","7.10","7.11","7.12","7.13","7.14","7.15","7.16","7.17","7.18","7.19","7.20","7.21","7.22","7.23","7.24","7.25","7.26","7.27","7.28","7.29","7.30","7.31","7.32","7.33","7.34","7.35","7.36","7.37","7.38","7.39","7.40","7.41","7.42","7.43","7.44","7.45","7.46","7.47","7.48","7.49","7.50","7.51","7.52","7.53","7.54","7.55","7.56","7.57","7.58","7.59","7.60","7.61","7.62","7.63","7.64","7.65","7.66","7.67","7.68","7.69","7.70","7.71","7.72","7.73","7.74","7.75","7.76","7.77","7.78","7.79","7.80","7.81","7.82","7.83","7.84","7.85","7.86","7.87","7.88","7.89","7.90","7.91","7.92","7.93","7.94","7.95","7.96","7.97","7.98","7.99","8.00","8.01","8.02","8.03","8.04","8.05","8.06","8.07","8.08","8.09","8.10","8.11","8.12","8.13","8.14","8.15","8.16","8.17","8.18","8.19","8.20","8.21","8.22","8.23","8.24","8.25","8.26","8.27","8.28","8.29","8.30","8.31","8.32","8.33","8.34","8.35","8.36","8.37","8.38","8.39","8.40","8.41","8.42","8.43","8.44","8.45","8.46","8.47","8.48","8.49","8.50","8.51","8.52","8.53","8.54","8.55","8.56","8.57","8.58","8.59","8.60","8.61","8.62","8.63","8.64","8.65","8.66","8.67","8.68","8.69","8.70","8.71","8.72","8.73","8.74","8.75","8.76","8.77","8.78","8.79","8.80","8.81","8.82","8.83","8.84","8.85","8.86","8.87","8.88","8.89","8.90","8.91","8.92","8.93","8.94","8.95","8.96","8.97","8.98","8.99","9.00","9.01","9.02","9.03","9.04","9.05","9.06","9.07","9.08","9.09","9.10","9.11","9.12","9.13","9.14","9.15","9.16","9.17","9.18","9.19","9.20","9.21","9.22","9.23","9.24","9.25","9.26","9.27","9.28","9.29","9.30","9.31","9.32","9.33","9.34","9.35","9.36","9.37","9.38","9.39","9.40","9.41","9.42","9.43","9.44","9.45","9.46","9.47","9.48","9.49","9.50","9.51","9.52","9.53","9.54","9.55","9.56","9.57","9.58","9.59","9.60","9.61","9.62","9.63","9.64","9.65","9.66","9.67","9.68","9.69","9.70","9.71","9.72","9.73","9.74","9.75","9.76","9.77","9.78","9.79","9.80","9.81","9.82","9.83","9.84","9.85","9.86","9.87","9.88","9.89","9.90","9.91","9.92","9.93","9.94","9.95","9.96","9.97","9.98","9.99"]; } ); // HtmlView Page linking property 'Options' for element 'comboBox2'
          _view.comboBox2.setAction("OnChange", function(_data,_info) {
  //resultofstringvalue = selected[0].substring(13,14); //checking mutliples single digit
  //resultofstringvalue2 = selected[0].substring(13,15); // double digits
  //resultofstringvalue3 = selected[0].substring(11,13); // double digits factors
  option = _view.comboBox2.getProperty("SelectedOptions");
  //alert(option);
  l_enterK1f =option;
  showAnswerFlag=true;

}); // HtmlView Page setting action 'OnChange' for element 'comboBox2'
          _view.comboBox2.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'comboBox2'
          _view.comboBox2.linkProperty("Display",  function() { return inputdropmenu?"inline-block":"none"; } ); // HtmlView Page linking property 'Display' for element 'comboBox2'
          _view.textField2.linkProperty("Background",  function() { return K1fcorrectbackground; }, function(_v) { K1fcorrectbackground = _v; } ); // HtmlView Page linking property 'Background' for element 'textField2'
          _view.textField2.linkProperty("Value",  function() { return l_enterK1f; }, function(_v) { l_enterK1f = _v; } ); // HtmlView Page linking property 'Value' for element 'textField2'
          _view.textField2.setAction("OnChange", function(_data,_info) {
  showAnswerFlag=true;

}); // HtmlView Page setting action 'OnChange' for element 'textField2'
          _view.textField2.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'textField2'
          _view.textField2.linkProperty("Display",  function() { return !inputdropmenu?"inline-block":"none"; } ); // HtmlView Page linking property 'Display' for element 'textField2'
          _view.zeroErrorUnitLabel.linkProperty("Height",  function() { return !_isMobile?"":"0"; } ); // HtmlView Page linking property 'Height' for element 'zeroErrorUnitLabel'
          _view.zeroErrorUnitLabel.linkProperty("Width",  function() { return !_isMobile?"":"0"; } ); // HtmlView Page linking property 'Width' for element 'zeroErrorUnitLabel'
          _view.zeroErrorUnitLabel.linkProperty("Background",  function() { return K1fcorrectbackground; }, function(_v) { K1fcorrectbackground = _v; } ); // HtmlView Page linking property 'Background' for element 'zeroErrorUnitLabel'
          _view.zeroErrorUnitLabel.linkProperty("Visibility",  function() { return !_isMobile; } ); // HtmlView Page linking property 'Visibility' for element 'zeroErrorUnitLabel'
          _view.zeroErrorUnitLabel.linkProperty("Font",  function() { return font; }, function(_v) { font = _v; } ); // HtmlView Page linking property 'Font' for element 'zeroErrorUnitLabel'
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

function Micrometer02_View (_topFrame,_viewNumber,_libraryPath,_codebasePath) {
  var _view;
  switch(_viewNumber) {
    case -10 : break; // make Lint happy
    default :
    case 0: _view = Micrometer02_View_0 (_topFrame); break;
  } // end of switch

  if (_codebasePath) _view._setResourcePath(_codebasePath);

  if (_libraryPath) _view._setLibraryPath(_libraryPath);

  _view._addDescriptionPage('About','./Micrometer02_Intro_1.html');

  return _view;
} // end of main function

function Micrometer02_View_0 (_topFrame) {
  var _view = EJSS_CORE.createView(_topFrame);

  _view._reset = function() {
    _view._clearAll();
    _view._addElement(EJSS_INTERFACE.panel,"fullscreen", _view._topFrame) // EJsS HtmlView.HtmlView Page: declaration of element 'fullscreen'
      .setProperty("Height","100%") // EJsS HtmlView.HtmlView Page: setting property 'Height' for element 'fullscreen'
      .setProperty("Width","100%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'fullscreen'
      .setProperty("CSS",{   "position" : "absolute",   "top" : "100%",    "margin-left":"0px",    "left":"0%" });

    _view._addElement(EJSS_INTERFACE.panel,"panel", _view.fullscreen) // EJsS HtmlView.HtmlView Page: declaration of element 'panel'
      .setProperty("Height","100%") // EJsS HtmlView.HtmlView Page: setting property 'Height' for element 'panel'
      .setProperty("Width","100%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'panel'
      .setProperty("CSS",{   "position" : "absolute",   "top" : "0%",    "margin-left":"0px",    "left":"0%" }) // EJsS HtmlView.HtmlView Page: setting property 'CSS' for element 'panel'
      ;

    _view._addElement(EJSS_DRAWING2D.plottingPanel,"plottingPanel", _view.panel) // EJsS HtmlView.HtmlView Page: declaration of element 'plottingPanel'
      .setProperty("Width","100%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'plottingPanel'
      .setProperty("Gutters",[0,0,0,0]) // EJsS HtmlView.HtmlView Page: setting property 'Gutters' for element 'plottingPanel'
      .setProperty("ShowAreaRectangle",false) // EJsS HtmlView.HtmlView Page: setting property 'ShowAreaRectangle' for element 'plottingPanel'
      .setProperty("EnabledZooming",true) // EJsS HtmlView.HtmlView Page: setting property 'EnabledZooming' for element 'plottingPanel'
      .setProperty("YScalePrecision",0) // EJsS HtmlView.HtmlView Page: setting property 'YScalePrecision' for element 'plottingPanel'
      .setProperty("XFixedTick",0) // EJsS HtmlView.HtmlView Page: setting property 'XFixedTick' for element 'plottingPanel'
      .setProperty("YFixedTick",0) // EJsS HtmlView.HtmlView Page: setting property 'YFixedTick' for element 'plottingPanel'
      .setProperty("XTickStep",100) // EJsS HtmlView.HtmlView Page: setting property 'XTickStep' for element 'plottingPanel'
      .setProperty("YTickStep",100) // EJsS HtmlView.HtmlView Page: setting property 'YTickStep' for element 'plottingPanel'
      .setProperty("AllowScalingDragging",true) // EJsS HtmlView.HtmlView Page: setting property 'AllowScalingDragging' for element 'plottingPanel'
      .setProperty("XAutoTicks",false) // EJsS HtmlView.HtmlView Page: setting property 'XAutoTicks' for element 'plottingPanel'
      .setProperty("GridXShow",false) // EJsS HtmlView.HtmlView Page: setting property 'GridXShow' for element 'plottingPanel'
      .setProperty("Enabled",true) // EJsS HtmlView.HtmlView Page: setting property 'Enabled' for element 'plottingPanel'
      .setProperty("Title","World View of the Micrometer Model") // EJsS HtmlView.HtmlView Page: setting property 'Title' for element 'plottingPanel'
      .setProperty("MaximumY",100) // EJsS HtmlView.HtmlView Page: setting property 'MaximumY' for element 'plottingPanel'
      .setProperty("MaximumX",170) // EJsS HtmlView.HtmlView Page: setting property 'MaximumX' for element 'plottingPanel'
      .setProperty("EnabledDragging","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledDragging' for element 'plottingPanel'
      .setProperty("GridYShow",false) // EJsS HtmlView.HtmlView Page: setting property 'GridYShow' for element 'plottingPanel'
      .setProperty("YAutoTicks",false) // EJsS HtmlView.HtmlView Page: setting property 'YAutoTicks' for element 'plottingPanel'
      .setProperty("MinimumX",-230) // EJsS HtmlView.HtmlView Page: setting property 'MinimumX' for element 'plottingPanel'
      .setProperty("MinimumY",-170) // EJsS HtmlView.HtmlView Page: setting property 'MinimumY' for element 'plottingPanel'
      .setProperty("TitleY","y") // EJsS HtmlView.HtmlView Page: setting property 'TitleY' for element 'plottingPanel'
      .setProperty("TitleX","x") // EJsS HtmlView.HtmlView Page: setting property 'TitleX' for element 'plottingPanel'
      .setProperty("AutoScaleY",false) // EJsS HtmlView.HtmlView Page: setting property 'AutoScaleY' for element 'plottingPanel'
      .setProperty("AutoScaleX",false) // EJsS HtmlView.HtmlView Page: setting property 'AutoScaleX' for element 'plottingPanel'
      .setProperty("XScalePrecision",0) // EJsS HtmlView.HtmlView Page: setting property 'XScalePrecision' for element 'plottingPanel'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"parts", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'parts'
      ;

    _view._addElement(EJSS_DRAWING2D.analyticCurve,"Frameorange", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'Frameorange'
      .setProperty("FunctionY","-90*sin(cta)") // EJsS HtmlView.HtmlView Page: setting property 'FunctionY' for element 'Frameorange'
      .setProperty("FunctionX","90*cos(cta)-90") // EJsS HtmlView.HtmlView Page: setting property 'FunctionX' for element 'Frameorange'
      .setProperty("NumPoints",36) // EJsS HtmlView.HtmlView Page: setting property 'NumPoints' for element 'Frameorange'
      .setProperty("Minimum",0) // EJsS HtmlView.HtmlView Page: setting property 'Minimum' for element 'Frameorange'
      .setProperty("Variable","cta") // EJsS HtmlView.HtmlView Page: setting property 'Variable' for element 'Frameorange'
      .setProperty("LineColor","Orange") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'Frameorange'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'Frameorange'
      .setProperty("DrawLines",true) // EJsS HtmlView.HtmlView Page: setting property 'DrawLines' for element 'Frameorange'
      .setProperty("LineWidth",40) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'Frameorange'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"right2magenta2", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'right2magenta2'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'right2magenta2'
      .setProperty("CornerRadius",20) // EJsS HtmlView.HtmlView Page: setting property 'CornerRadius' for element 'right2magenta2'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'right2magenta2'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'right2magenta2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"leftanvilgrey2", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'leftanvilgrey2'
      .setProperty("FillColor","rgba(200,220,208,1)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'leftanvilgrey2'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'leftanvilgrey2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"leftanvil2greytip2", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'leftanvil2greytip2'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'leftanvil2greytip2'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'leftanvil2greytip2'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'leftanvil2greytip2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"test", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'test'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'test'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'test'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'test'
      .setProperty("SizeY",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'test'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'test'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"test2", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'test2'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'test2'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'test2'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'test2'
      .setProperty("SizeY",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'test2'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'test2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"object22", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'object22'
      .setProperty("FillColor","Darkblue") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'object22'
      .setProperty("RelativePosition","SOUTH_WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'object22'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'object22'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'object22'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"bottomposition", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'bottomposition'
      .setProperty("FillColor","rgba(0,255,0,0.0)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'bottomposition'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'bottomposition'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'bottomposition'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'bottomposition'
      .setProperty("SizeY",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'bottomposition'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"bottomresize", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'bottomresize'
      .setProperty("FillColor","rgba(0,255,0,0.0)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'bottomresize'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'bottomresize'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'bottomresize'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'bottomresize'
      .setProperty("SizeY",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'bottomresize'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'bottomresize'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"arrowdragme2", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'arrowdragme2'
      .setProperty("MarkEnd","ANGLE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'arrowdragme2'
      .setProperty("LineColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'arrowdragme2'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'arrowdragme2'
      .setProperty("Offset","SOUTH_WEST") // EJsS HtmlView.HtmlView Page: setting property 'Offset' for element 'arrowdragme2'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"dragme2", _view.parts) // EJsS HtmlView.HtmlView Page: declaration of element 'dragme2'
      .setProperty("Text","drag me") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'dragme2'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'dragme2'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"stockyellow", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'stockyellow'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"yellowruler2", _view.stockyellow) // EJsS HtmlView.HtmlView Page: declaration of element 'yellowruler2'
      .setProperty("FillColor","LightGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'yellowruler2'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'yellowruler2'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'yellowruler2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"yellowruler", _view.stockyellow) // EJsS HtmlView.HtmlView Page: declaration of element 'yellowruler'
      .setProperty("FillColor","url(#mygrandient2)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'yellowruler'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'yellowruler'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'yellowruler'
      ;

    _view._addElement(EJSS_DRAWING2D.arrowSet,"arrowSet", _view.stockyellow) // EJsS HtmlView.HtmlView Page: declaration of element 'arrowSet'
      .setProperty("MarkEnd","NONE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'arrowSet'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'arrowSet'
      .setProperty("MarkStart","NONE") // EJsS HtmlView.HtmlView Page: setting property 'MarkStart' for element 'arrowSet'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'arrowSet'
      ;

    _view._addElement(EJSS_DRAWING2D.segment,"horizontalline", _view.stockyellow) // EJsS HtmlView.HtmlView Page: declaration of element 'horizontalline'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'horizontalline'
      .setProperty("SizeY",0) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'horizontalline'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'horizontalline'
      ;

    _view._addElement(EJSS_DRAWING2D.textSet,"textSetnumbersonmainscale", _view.stockyellow) // EJsS HtmlView.HtmlView Page: declaration of element 'textSetnumbersonmainscale'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'textSetnumbersonmainscale'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"hintred3", _view.stockyellow) // EJsS HtmlView.HtmlView Page: declaration of element 'hintred3'
      .setProperty("FillColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'hintred3'
      .setProperty("RelativePosition","EAST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'hintred3'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'hintred3'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"hintred", _view.stockyellow) // EJsS HtmlView.HtmlView Page: declaration of element 'hintred'
      .setProperty("FillColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'hintred'
      .setProperty("RelativePosition","EAST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'hintred'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'hintred'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"hintred22", _view.stockyellow) // EJsS HtmlView.HtmlView Page: declaration of element 'hintred22'
      .setProperty("SizeX",0) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'hintred22'
      .setProperty("LineColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'hintred22'
      .setProperty("Attributes",{ "stroke-dasharray":"8 8 8 8" }) // EJsS HtmlView.HtmlView Page: setting property 'Attributes' for element 'hintred22'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'hintred22'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"hintred2", _view.stockyellow) // EJsS HtmlView.HtmlView Page: declaration of element 'hintred2'
      .setProperty("SizeX",0) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'hintred2'
      .setProperty("LineColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'hintred2'
      .setProperty("Attributes",{ "stroke-dasharray":"8 8 8 8" }) // EJsS HtmlView.HtmlView Page: setting property 'Attributes' for element 'hintred2'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'hintred2'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"spindledarkgreen", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'spindledarkgreen'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"polygon2", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'polygon2'
      .setProperty("FillColor","Gray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'polygon2'
      .setProperty("Sensitivity",0) // EJsS HtmlView.HtmlView Page: setting property 'Sensitivity' for element 'polygon2'
      .setProperty("MovesGroup",true) // EJsS HtmlView.HtmlView Page: setting property 'MovesGroup' for element 'polygon2'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'polygon2'
      .setProperty("DrawLines",true) // EJsS HtmlView.HtmlView Page: setting property 'DrawLines' for element 'polygon2'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"polygon_dragworkinghere", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'polygon_dragworkinghere'
      .setProperty("FillColor","Gray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'polygon_dragworkinghere'
      .setProperty("Sensitivity",0) // EJsS HtmlView.HtmlView Page: setting property 'Sensitivity' for element 'polygon_dragworkinghere'
      .setProperty("MovesGroup",false) // EJsS HtmlView.HtmlView Page: setting property 'MovesGroup' for element 'polygon_dragworkinghere'
      .setProperty("Measured",true) // EJsS HtmlView.HtmlView Page: setting property 'Measured' for element 'polygon_dragworkinghere'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'polygon_dragworkinghere'
      .setProperty("DrawLines",true) // EJsS HtmlView.HtmlView Page: setting property 'DrawLines' for element 'polygon_dragworkinghere'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"SVG23", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'SVG23'
      .setProperty("FillColor","url(#mygrandient)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'SVG23'
      .setProperty("MovesGroup",true) // EJsS HtmlView.HtmlView Page: setting property 'MovesGroup' for element 'SVG23'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'SVG23'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'SVG23'
      .setProperty("Measured",true) // EJsS HtmlView.HtmlView Page: setting property 'Measured' for element 'SVG23'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"SVGwhiteboard_to_bend_with", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'SVGwhiteboard_to_bend_with'
      .setProperty("FillColor","White") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'SVGwhiteboard_to_bend_with'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'SVGwhiteboard_to_bend_with'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'SVGwhiteboard_to_bend_with'
      .setProperty("LineColor","White") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'SVGwhiteboard_to_bend_with'
      ;

    _view._addElement(EJSS_DRAWING2D.image,"image", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'image'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'image'
      .setProperty("ImageUrl","./Micrometer/pattern-1314301_640.jpg") // EJsS HtmlView.HtmlView Page: setting property 'ImageUrl' for element 'image'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"rough2", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'rough2'
      .setProperty("FillColor","LightGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'rough2'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'rough2'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'rough2'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'rough2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"rough", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'rough'
      .setProperty("FillColor","LightGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'rough'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'rough'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'rough'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"drag", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'drag'
      .setProperty("X",30) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'drag'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'drag'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"reposition3", _view.drag) // EJsS HtmlView.HtmlView Page: declaration of element 'reposition3'
      .setProperty("FillColor","rgba(0,255,0,0.0)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'reposition3'
      .setProperty("Sensitivity",100) // EJsS HtmlView.HtmlView Page: setting property 'Sensitivity' for element 'reposition3'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'reposition3'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'reposition3'
      .setProperty("LineColor","Green") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'reposition3'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'reposition3'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'reposition3'
      .setProperty("SizeY",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'reposition3'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"arrowdragme", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'arrowdragme'
      .setProperty("MarkEnd","ANGLE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'arrowdragme'
      .setProperty("LineColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'arrowdragme'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'arrowdragme'
      .setProperty("Offset","SOUTH_WEST") // EJsS HtmlView.HtmlView Page: setting property 'Offset' for element 'arrowdragme'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"dragme", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'dragme'
      .setProperty("Text","drag me") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'dragme'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'dragme'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"timblegreen", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'timblegreen'
      ;

    _view._addElement(EJSS_DRAWING2D.textSet,"textSet2", _view.timblegreen) // EJsS HtmlView.HtmlView Page: declaration of element 'textSet2'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'textSet2'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'textSet2'
      ;

    _view._addElement(EJSS_DRAWING2D.segmentSet,"shorthorizontalline", _view.timblegreen) // EJsS HtmlView.HtmlView Page: declaration of element 'shorthorizontalline'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'shorthorizontalline'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'shorthorizontalline'
      .setProperty("Offset","SOUTH_WEST") // EJsS HtmlView.HtmlView Page: setting property 'Offset' for element 'shorthorizontalline'
      ;

    _view._addElement(EJSS_DRAWING2D.arrowSet,"graduatemarksblue", _view.timblegreen) // EJsS HtmlView.HtmlView Page: declaration of element 'graduatemarksblue'
      .setProperty("MarkEnd","NONE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'graduatemarksblue'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'graduatemarksblue'
      .setProperty("MarkStart","NONE") // EJsS HtmlView.HtmlView Page: setting property 'MarkStart' for element 'graduatemarksblue'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'graduatemarksblue'
      ;

    _view._addElement(EJSS_DRAWING2D.arrowSet,"graduatemarksbluelonger", _view.timblegreen) // EJsS HtmlView.HtmlView Page: declaration of element 'graduatemarksbluelonger'
      .setProperty("MarkEnd","NONE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'graduatemarksbluelonger'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'graduatemarksbluelonger'
      .setProperty("MarkStart","NONE") // EJsS HtmlView.HtmlView Page: setting property 'MarkStart' for element 'graduatemarksbluelonger'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'graduatemarksbluelonger'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"horitontalguide2", _view.timblegreen) // EJsS HtmlView.HtmlView Page: declaration of element 'horitontalguide2'
      .setProperty("LineColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'horitontalguide2'
      .setProperty("Attributes",{ "stroke-dasharray":"8 8 8 8" }) // EJsS HtmlView.HtmlView Page: setting property 'Attributes' for element 'horitontalguide2'
      .setProperty("SizeY",0) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'horitontalguide2'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'horitontalguide2'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"verticalguide", _view.timblegreen) // EJsS HtmlView.HtmlView Page: declaration of element 'verticalguide'
      .setProperty("MarkEnd","NONE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'verticalguide'
      .setProperty("SizeX",0) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'verticalguide'
      .setProperty("LineColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'verticalguide'
      .setProperty("Attributes",{ "stroke-dasharray":"8 8 8 8" }) // EJsS HtmlView.HtmlView Page: setting property 'Attributes' for element 'verticalguide'
      .setProperty("MarkStart","NONE") // EJsS HtmlView.HtmlView Page: setting property 'MarkStart' for element 'verticalguide'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'verticalguide'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"text2", _view.timblegreen) // EJsS HtmlView.HtmlView Page: declaration of element 'text2'
      .setProperty("FillColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'text2'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'text2'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"text", _view.timblegreen) // EJsS HtmlView.HtmlView Page: declaration of element 'text'
      .setProperty("FillColor","Red") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'text'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'text'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"greenrod", _view.spindledarkgreen) // EJsS HtmlView.HtmlView Page: declaration of element 'greenrod'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"rodgreen22", _view.greenrod) // EJsS HtmlView.HtmlView Page: declaration of element 'rodgreen22'
      .setProperty("FillColor","LightGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'rodgreen22'
      .setProperty("RelativePosition","EAST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'rodgreen22'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'rodgreen22'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"rodgreen2", _view.greenrod) // EJsS HtmlView.HtmlView Page: declaration of element 'rodgreen2'
      .setProperty("FillColor","url(#mygrandient)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'rodgreen2'
      .setProperty("RelativePosition","EAST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'rodgreen2'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'rodgreen2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"rodgreentip", _view.greenrod) // EJsS HtmlView.HtmlView Page: declaration of element 'rodgreentip'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'rodgreentip'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'rodgreentip'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'rodgreentip'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"ratcheteal", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'ratcheteal'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"rachetteteal", _view.ratcheteal) // EJsS HtmlView.HtmlView Page: declaration of element 'rachetteteal'
      .setProperty("FillColor","Cyan") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'rachetteteal'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'rachetteteal'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'rachetteteal'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'rachetteteal'
      ;

    _view._addElement(EJSS_DRAWING2D.image,"image2", _view.ratcheteal) // EJsS HtmlView.HtmlView Page: declaration of element 'image2'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'image2'
      .setProperty("ImageUrl","./Micrometer/Screen Shot 2017-01-03 at 1.58.23 PM.png") // EJsS HtmlView.HtmlView Page: setting property 'ImageUrl' for element 'image2'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'image2'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'image2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"rough222", _view.ratcheteal) // EJsS HtmlView.HtmlView Page: declaration of element 'rough222'
      .setProperty("FillColor","LightGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'rough222'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'rough222'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'rough222'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"rough22", _view.ratcheteal) // EJsS HtmlView.HtmlView Page: declaration of element 'rough22'
      .setProperty("FillColor","LightGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'rough22'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'rough22'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'rough22'
      ;

    _view._addElement(EJSS_DRAWING2D.arrowSet,"graduatemarksrat", _view.ratcheteal) // EJsS HtmlView.HtmlView Page: declaration of element 'graduatemarksrat'
      .setProperty("MarkEnd","NONE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'graduatemarksrat'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'graduatemarksrat'
      .setProperty("MarkStart","NONE") // EJsS HtmlView.HtmlView Page: setting property 'MarkStart' for element 'graduatemarksrat'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'graduatemarksrat'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"greyframe", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'greyframe'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"trackergood2", _view.greyframe) // EJsS HtmlView.HtmlView Page: declaration of element 'trackergood2'
      .setProperty("PointsY",[-0.384,0.0,-6.843,-14.59,-20.19,-73.16,-83.06,-90.81,-96.41,-102.0,-111.5,-120.5,-129.6,-136.5,-150.7,-160.1,-170.9,-178.2,-181.2,-183.8,-182.1,-179.1,-174.8,-166.6,-160.6,-148.1,-136.9,-121.0,-108.5,-88.23,-74.02,-34.83,-25.97,-18.11,-11.97,-6.797,-0.469,6.435,16.02,16.41,12.43,7.564,2.693,-2.025,-6.895,-12.53,-18.61,-24.55,-32.92,-75.84,-80.68,-86.64,-91.39,-95.32,-99.39,-102.9,-106.2,-108.9,-110.4,-110.5,-110.2,-108.9,-107.0,-104.1,-101.0,-97.49,-93.29,-89.08,-83.66,-77.43]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'trackergood2'
      .setProperty("PointsX",[0.968,-20.99,-22.29,-21.42,-21.86,-44.68,-48.55,-49.42,-50.28,-49.42,-46.83,-43.39,-38.65,-34.34,-23.58,-10.23,5.274,24.65,39.29,54.36,68.14,84.94,96.14,110.8,119.8,134.0,142.6,151.7,156.9,161.6,161.6,161.2,159.3,159.5,158.9,158.9,158.9,158.9,160.5,109.1,108.5,108.4,108.2,108.1,107.9,107.9,108.1,108.5,109.0,109.3,109.1,107.2,105.3,102.7,99.56,95.90,91.16,85.33,78.69,32.82,28.39,24.32,19.99,15.65,11.72,8.735,5.752,3.854,2.092,1.414]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'trackergood2'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'trackergood2'
      .setProperty("SizeX",1.1) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'trackergood2'
      .setProperty("X",-175) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'trackergood2'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'trackergood2'
      .setProperty("Y",14) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'trackergood2'
      .setProperty("LineWidth",1) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'trackergood2'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"trackergood", _view.greyframe) // EJsS HtmlView.HtmlView Page: declaration of element 'trackergood'
      .setProperty("PointsY",[-0.384,0.0,-6.843,-14.59,-20.19,-73.16,-83.06,-90.81,-96.41,-102.0,-111.5,-120.5,-129.6,-136.5,-150.7,-160.1,-170.9,-178.2,-181.2,-183.8,-182.1,-179.1,-174.8,-166.6,-160.6,-148.1,-136.9,-121.0,-108.5,-88.23,-74.02,-34.83,-25.97,-18.11,-11.97,-6.797,-0.469,6.435,16.02,16.41,12.43,7.564,2.693,-2.025,-6.895,-12.53,-18.61,-24.55,-32.92,-75.84,-80.68,-86.64,-91.39,-95.32,-99.39,-102.9,-106.2,-108.9,-110.4,-110.5,-110.2,-108.9,-107.0,-104.1,-101.0,-97.49,-93.29,-89.08,-83.66,-77.43]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'trackergood'
      .setProperty("PointsX",[0.968,-20.99,-22.29,-21.42,-21.86,-44.68,-48.55,-49.42,-50.28,-49.42,-46.83,-43.39,-38.65,-34.34,-23.58,-10.23,5.274,24.65,39.29,54.36,68.14,84.94,96.14,110.8,119.8,134.0,142.6,151.7,156.9,161.6,161.6,161.2,159.3,159.5,158.9,158.9,158.9,158.9,160.5,109.1,108.5,108.4,108.2,108.1,107.9,107.9,108.1,108.5,109.0,109.3,109.1,107.2,105.3,102.7,99.56,95.90,91.16,85.33,78.69,32.82,28.39,24.32,19.99,15.65,11.72,8.735,5.752,3.854,2.092,1.414]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'trackergood'
      .setProperty("FillColor","url(#mygrandient1)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'trackergood'
      .setProperty("SizeX",1.1) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'trackergood'
      .setProperty("X",-175) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'trackergood'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'trackergood'
      .setProperty("Y",14) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'trackergood'
      .setProperty("LineWidth",1) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'trackergood'
      ;

    _view._addElement(EJSS_DRAWING2D.polygon,"drawingtrackerinsideline", _view.greyframe) // EJsS HtmlView.HtmlView Page: declaration of element 'drawingtrackerinsideline'
      .setProperty("PointsY",[-34.72,-35.69,-40.52,-53.57,-71.45,-85.47,-95.14,-102.9,-111.6,-119.3,-128.5,-138.6,-145.4,-153.6,-158.9,-165.2,-173.0,-175.4,-176.8,-176.8,-173.4,-169.1,-163.3,-155.1,-143.0,-130.4,-119.3,-101.9,-87.89,-72.90,-58.89,-47.29,-36.65,-34.24,-33.75,-33.75,-36.17,-43.42,-73.87,-89.82,-104.3,-110.1,-115.9,-117.4,-117.4,-117.9,-112.5,-103.8,-92.72,-80.15,-55.99,-44.87,-38.59,-35.20]) // EJsS HtmlView.HtmlView Page: setting property 'PointsY' for element 'drawingtrackerinsideline'
      .setProperty("PointsX",[-14.98,-19.33,-22.72,-29.49,-36.25,-42.05,-43.50,-42.05,-39.15,-35.77,-32.39,-25.62,-19.33,-10.63,-3.384,7.733,26.10,38.67,48.82,62.35,77.82,93.29,104.4,115.5,127.6,137.8,144.0,150.3,153.2,153.7,153.7,153.7,151.8,146.5,132.0,123.3,117.5,116.5,115.5,114.1,104.4,96.67,84.59,72.50,55.10,31.42,15.95,6.766,-1.451,-5.801,-5.801,-5.801,-6.768,-10.63]) // EJsS HtmlView.HtmlView Page: setting property 'PointsX' for element 'drawingtrackerinsideline'
      .setProperty("FillColor","url(#mygrandient)") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'drawingtrackerinsideline'
      .setProperty("SizeX",1.1) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'drawingtrackerinsideline'
      .setProperty("X",-175) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'drawingtrackerinsideline'
      .setProperty("LineColor","Black") // EJsS HtmlView.HtmlView Page: setting property 'LineColor' for element 'drawingtrackerinsideline'
      .setProperty("Y",14) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'drawingtrackerinsideline'
      .setProperty("LineWidth",1) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'drawingtrackerinsideline'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"ospsg", _view.greyframe) // EJsS HtmlView.HtmlView Page: declaration of element 'ospsg'
      .setProperty("X",-110) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'ospsg'
      .setProperty("Y",-140) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'ospsg'
      .setProperty("Text","") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'ospsg'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'ospsg'
      .setProperty("EnabledPosition","ENABLED_ANY") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'ospsg'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"unlock22", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'unlock22'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"rod2", _view.unlock22) // EJsS HtmlView.HtmlView Page: declaration of element 'rod2'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'rod2'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'rod2'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'rod2'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'rod2'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'rod2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"circle2", _view.unlock22) // EJsS HtmlView.HtmlView Page: declaration of element 'circle2'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'circle2'
      .setProperty("MovesGroup",true) // EJsS HtmlView.HtmlView Page: setting property 'MovesGroup' for element 'circle2'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'circle2'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'circle2'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'circle2'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'circle2'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"circle23", _view.unlock22) // EJsS HtmlView.HtmlView Page: declaration of element 'circle23'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'circle23'
      .setProperty("MovesGroup",true) // EJsS HtmlView.HtmlView Page: setting property 'MovesGroup' for element 'circle23'
      .setProperty("ShapeType","ELLIPSE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'circle23'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'circle23'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'circle23'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'circle23'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"circle22", _view.unlock22) // EJsS HtmlView.HtmlView Page: declaration of element 'circle22'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'circle22'
      .setProperty("MovesGroup",true) // EJsS HtmlView.HtmlView Page: setting property 'MovesGroup' for element 'circle22'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'circle22'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'circle22'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'circle22'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'circle22'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'circle22'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"lock", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'lock'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"rod22", _view.lock) // EJsS HtmlView.HtmlView Page: declaration of element 'rod22'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'rod22'
      .setProperty("RelativePosition","WEST") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'rod22'
      .setProperty("ShapeType","ROUND_RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'rod22'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'rod22'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'rod22'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"circle24", _view.lock) // EJsS HtmlView.HtmlView Page: declaration of element 'circle24'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'circle24'
      .setProperty("MovesGroup",true) // EJsS HtmlView.HtmlView Page: setting property 'MovesGroup' for element 'circle24'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'circle24'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'circle24'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'circle24'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'circle24'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"circle232", _view.lock) // EJsS HtmlView.HtmlView Page: declaration of element 'circle232'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'circle232'
      .setProperty("MovesGroup",true) // EJsS HtmlView.HtmlView Page: setting property 'MovesGroup' for element 'circle232'
      .setProperty("ShapeType","ELLIPSE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'circle232'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'circle232'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'circle232'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'circle232'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"circle222", _view.lock) // EJsS HtmlView.HtmlView Page: declaration of element 'circle222'
      .setProperty("FillColor","DarkGray") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'circle222'
      .setProperty("MovesGroup",true) // EJsS HtmlView.HtmlView Page: setting property 'MovesGroup' for element 'circle222'
      .setProperty("ShapeType","WHEEL") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'circle222'
      .setProperty("X",0) // EJsS HtmlView.HtmlView Page: setting property 'X' for element 'circle222'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'circle222'
      .setProperty("LineWidth",2) // EJsS HtmlView.HtmlView Page: setting property 'LineWidth' for element 'circle222'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'circle222'
      ;

    _view._addElement(EJSS_DRAWING2D.group,"step", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'step'
      .setProperty("Y",45) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'step'
      ;

    _view._addElement(EJSS_DRAWING2D.image,"image3", _view.step) // EJsS HtmlView.HtmlView Page: declaration of element 'image3'
      .setProperty("SizeX",40) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'image3'
      .setProperty("ImageUrl","./Micrometer/unnamed.gif") // EJsS HtmlView.HtmlView Page: setting property 'ImageUrl' for element 'image3'
      .setProperty("Y",0) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'image3'
      .setProperty("SizeY",40) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'image3'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'image3'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"arrow2", _view.step) // EJsS HtmlView.HtmlView Page: declaration of element 'arrow2'
      .setProperty("MarkEnd","TRIANGLE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'arrow2'
      .setProperty("SizeX",-20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'arrow2'
      .setProperty("SizeY",0) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'arrow2'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'arrow2'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'arrow2'
      ;

    _view._addElement(EJSS_DRAWING2D.arrow,"arrow", _view.step) // EJsS HtmlView.HtmlView Page: declaration of element 'arrow'
      .setProperty("MarkEnd","TRIANGLE") // EJsS HtmlView.HtmlView Page: setting property 'MarkEnd' for element 'arrow'
      .setProperty("SizeX",20) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'arrow'
      .setProperty("SizeY",0) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'arrow'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'arrow'
      .setProperty("EnabledPosition","ENABLED_NO_MOVE") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'arrow'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"answer", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'answer'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'answer'
      ;

    _view._addElement(EJSS_DRAWING2D.text,"mytext", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'mytext'
      .setProperty("Text","mytext") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'mytext'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'mytext'
      ;

    _view._addElement(EJSS_DRAWING2D.shape,"dragdot", _view.plottingPanel) // EJsS HtmlView.HtmlView Page: declaration of element 'dragdot'
      .setProperty("FillColor","Magenta") // EJsS HtmlView.HtmlView Page: setting property 'FillColor' for element 'dragdot'
      .setProperty("Sensitivity",0) // EJsS HtmlView.HtmlView Page: setting property 'Sensitivity' for element 'dragdot'
      .setProperty("SizeX",50) // EJsS HtmlView.HtmlView Page: setting property 'SizeX' for element 'dragdot'
      .setProperty("RelativePosition","CENTERED") // EJsS HtmlView.HtmlView Page: setting property 'RelativePosition' for element 'dragdot'
      .setProperty("ShapeType","RECTANGLE") // EJsS HtmlView.HtmlView Page: setting property 'ShapeType' for element 'dragdot'
      .setProperty("Y",-100) // EJsS HtmlView.HtmlView Page: setting property 'Y' for element 'dragdot'
      .setProperty("Visibility",false) // EJsS HtmlView.HtmlView Page: setting property 'Visibility' for element 'dragdot'
      .setProperty("SizeY",50) // EJsS HtmlView.HtmlView Page: setting property 'SizeY' for element 'dragdot'
      .setProperty("PixelSize",true) // EJsS HtmlView.HtmlView Page: setting property 'PixelSize' for element 'dragdot'
      .setProperty("EnabledPosition","ENABLED_X") // EJsS HtmlView.HtmlView Page: setting property 'EnabledPosition' for element 'dragdot'
      ;

    _view._addElement(EJSS_INTERFACE.panel,"control", _view.fullscreen) // EJsS HtmlView.HtmlView Page: declaration of element 'control'
      ;

    _view._addElement(EJSS_INTERFACE.twoStateButton,"collate", _view.control) // EJsS HtmlView.HtmlView Page: declaration of element 'collate'
      .setProperty("TextOn","☰") // EJsS HtmlView.HtmlView Page: setting property 'TextOn' for element 'collate'
      .setProperty("CSS",{"position": "fixed", "display": "block", "top":"10px","right": "60px"}) // EJsS HtmlView.HtmlView Page: setting property 'CSS' for element 'collate'
      .setProperty("TextOff","◀") // EJsS HtmlView.HtmlView Page: setting property 'TextOff' for element 'collate'
      .setProperty("Font","normal normal 3vw ") // EJsS HtmlView.HtmlView Page: setting property 'Font' for element 'collate'
      ;

    _view._addElement(EJSS_INTERFACE.panel,"inputfield", _view.control) // EJsS HtmlView.HtmlView Page: declaration of element 'inputfield'
      .setProperty("Width","90%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'inputfield'
      .setProperty("CSS",{   "position" : "absolute",   "top" : "0%",    "margin-right":"0px",    "left":"0%" }) // EJsS HtmlView.HtmlView Page: setting property 'CSS' for element 'inputfield'
      .setProperty("Display","inline-flex") // EJsS HtmlView.HtmlView Page: setting property 'Display' for element 'inputfield'
      ;

    _view._addElement(EJSS_INTERFACE.comboBox,"comboBox3", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'comboBox3'
      .setProperty("Tooltip","select user_defined and drag the mass") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'comboBox3'
      ;

    _view._addElement(EJSS_INTERFACE.comboBox,"comboBox", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'comboBox'
      .setProperty("Tooltip","select user_defined and drag the mass") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'comboBox'
      ;

    _view._addElement(EJSS_INTERFACE.twoStateButton,"playPauseButton", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'playPauseButton'
      .setProperty("Width","10%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'playPauseButton'
      .setProperty("TextOn","►") // EJsS HtmlView.HtmlView Page: setting property 'TextOn' for element 'playPauseButton'
      .setProperty("Tooltip","Play/Pause") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'playPauseButton'
      .setProperty("TextOff","||") // EJsS HtmlView.HtmlView Page: setting property 'TextOff' for element 'playPauseButton'
      ;

    _view._addElement(EJSS_INTERFACE.button,"resetButtonAdsMob", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'resetButtonAdsMob'
      .setProperty("Width","10%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'resetButtonAdsMob'
      .setProperty("Tooltip","Watch an Ads to support the development. Thank you!") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'resetButtonAdsMob'
      .setProperty("Text","🎥👍Ads↻") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'resetButtonAdsMob'
      ;

    _view._addElement(EJSS_INTERFACE.button,"resetButton", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'resetButton'
      .setProperty("Width","10%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'resetButton'
      .setProperty("Tooltip","Reset") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'resetButton'
      .setProperty("Text","↻") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'resetButton'
      ;

    _view._addElement(EJSS_INTERFACE.imageAndTextButton,"answer2", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'answer2'
      .setProperty("Text","?=") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'answer2'
      ;

    _view._addElement(EJSS_INTERFACE.comboBox,"comboBox2", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'comboBox2'
      .setProperty("Tooltip","select user_defined and drag the mass") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'comboBox2'
      ;

    _view._addElement(EJSS_INTERFACE.textField,"textField2", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'textField2'
      .setProperty("Width","10%") // EJsS HtmlView.HtmlView Page: setting property 'Width' for element 'textField2'
      .setProperty("Tooltip","key in your answer key") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'textField2'
      ;

    _view._addElement(EJSS_INTERFACE.imageAndTextButton,"zeroErrorUnitLabel", _view.inputfield) // EJsS HtmlView.HtmlView Page: declaration of element 'zeroErrorUnitLabel'
      .setProperty("Tooltip","millimetre") // EJsS HtmlView.HtmlView Page: setting property 'Tooltip' for element 'zeroErrorUnitLabel'
      .setProperty("Text"," mm ") // EJsS HtmlView.HtmlView Page: setting property 'Text' for element 'zeroErrorUnitLabel'
      ;

    _view._addElement(EJSS_INTERFACE.panel,"text3", _view.fullscreen) // EJsS HtmlView.HtmlView Page: declaration of element 'text3'
      .setProperty("CSS",{   "position" : "absolute",   "top" : "100%",    "margin-left":"0px",    "left":"0%" });

  };

  return _view;
}

</script>
  </head>
  <body>
    <div class="lds-ripple" id="exploader"><div></div><div></div></div>
    <div role="button" id="_topFrame" style="text-align:center; width: 100%;position: relative;"></div>
       
    <script type="text/javascript"><!--//--><![CDATA[//><!--
      var _model;
      var _scorm;
      window.addEventListener('load',
        function () { 
          _model =  new Micrometer02("_topFrame","_ejs_library/",null);
          if (typeof _isApp !== "undefined" && _isApp) _model.setRunAlways(true);
          TextResizeDetector.TARGET_ELEMENT_ID = '_topFrame';
          TextResizeDetector.USER_INIT_FUNC = function () {
            var iBase = TextResizeDetector.addEventListener(function(e,args) {
              _model._fontResized(args[0].iBase,args[0].iSize,args[0].iDelta);
              },null);
            _model._fontResized(iBase);
          };
          _model.onload();
          //document.getElementById('exploader').style.display = "none";
        }, false);      
    //--><!]]></script>
  </body>
</html>
