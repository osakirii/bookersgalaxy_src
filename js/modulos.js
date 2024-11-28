function openNav() {
    document.getElementById("navbar").style.width = "250px";
    document.getElementById("escuro").style.height = "100%";
  }
  function closeNav() {
    document.getElementById("navbar").style.width = "0";
    document.getElementById("escuro").style.height = "0";
  }

  function closeBar(){
    document.getElementById("navbar").style.width = "0";
  }


  function pesquisafocus(){
    document.getElementById("headerform").style.border = "1px solid #1D1E1D";
  }
  function pesquisablur(){
    document.getElementById("headerform").style.border = "1px solid transparent";
  }

  function AlertaSair() {
    this.setTimeout(closeBar);
    document.getElementById('alertBox').style.display = 'flex';
    document.getElementById('Escuro').style.display = 'block';
  }

  function AlertaNo() {
    document.getElementById('alertBox').style.display = 'none';
    closeNav();
  }

  function AlertaSi() {
    window.location ="/bookersgalaxy/modulos/logout.php";
  }

  function LoadingScreenEnd(){
    document.getElementById("loadingscreen").style.display = "none";
  }

  window.addEventListener('load', function() {
    this.document.getElementById("loadingscreen").style.opacity = "0";
    this.setTimeout(LoadingScreenEnd, 1000);
  })