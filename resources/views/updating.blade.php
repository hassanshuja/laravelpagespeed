<link rel="stylesheet" type="text/css" href="https://www.itrendin.com/css/update.scss">
<style lang="scss">
  @import url('https://fonts.googleapis.com/css?family=Satisfy');
  @import url('https://fonts.googleapis.com/css?family=Roboto');
  @import url('https://fonts.googleapis.com/css?family=Alegreya+Sans+SC:300');

  ion-content {
    font-family: 'Roboto';
  }

  .navbar-cs {
    position: absolute;
    color: #fff;
    padding: 10px;
  }

  .text-logo {
    font-family: Satisfy;
    font-size: 40px;
    z-index: 100;
  }

  .grid-page {
    color: #fff;
    display: grid;
    position: relative;
    grid-template-columns: repeat(1,1fr);
    width: 100%;
    align-items: center;
    justify-items: center;
    height: 100%;
    background: url("https://i.pinimg.com/originals/e8/7d/cf/e87dcfcd568a9d4dbd02a04fe6de61a4.jpg");
    z-index: -1;
    background-size: cover;
    background-position: center;

  }

  .grid-page-left {
    font-weight: 100;
    font-size: calc(40px + (40 - 30) * ((100vw - 300px) / (1600 - 300)));
  }
  .countdown-time{
    display: none;
  }
  .countdown {
    background: -webkit-linear-gradient(to right, rgba(203, 53, 107,1), rgba(189, 63, 50,1));
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, rgba(203, 53, 107,1), rgba(189, 63, 50,1));
    position: relative;
    mix-blend-mode: luminosity;
    font-weight: 100!important;
    margin-left: 2%;
    padding: 5px;
    border-radius: 5px;
    display: inline-block;
  }

  .date {
    width: auto;
    height: auto;
    background: transparent;
    display: inline-block;
    color: #fff;
  }
  .date p{
    margin:0;
  }
  .date .countdown-number {
    font-family: 'Roboto', sans-serif;
    font-size: 40px;
    text-align: center;
    margin: 0;
  }

  .date .time-text {
    width: 100%;
    background: transparent;
    font-size: 20px;
    color: #fff;
    text-transform: uppercase;
    display: block;
    padding: 6px 6px;
  }
.pyro{
  display:none;
  position:absolute!important;
  width:100%!important;
  height:100%!important;
  top:0!important;
}
.mainHldUpadte {
  position: fixed !important;
  top:0;
  left:0;
  right:0;
  bottom:0;
  z-index: 10000000000000000000000000000000000;
  width:100%;
  height:100%;
}
</style>
<div class="mainHldUpadte" >
    <div class="navbar-cs">
      {{-- <span class="text-logo">itrendin</span> --}}
    </div>
    <div class="grid-page"padding>
      <div class="grid-page-left">
        <span text-uppercase id="launching-text">Our new design is on it's waysss</span>
        <div class="countdown-time"text-center id="countdown-time">
          <div class="date">
              <p><span class="countdown-number"id="days"></span> <span class="time-text"padding>Days</span></p>
          </div>
          <div class="date">
              <p><span class="countdown-number"id="hours"></span> <span class="time-text"padding>Hours</span></p>
          </div>
          <div class="date">
              <p><span class="countdown-number"id="minutes"></span> <span class="time-text"padding>Minutes</span></p>
          </div>
          <div class="date">
              <p><span class="countdown-number"id="seconds"></span> <span class="time-text"padding>Seconds</span></p>
          </div>
        </div>
      </div>
      <div class="pyro"id="pyro">
        <div class="before"></div>
        <div class="after"></div>
      </div>
    </div>
    
  </div>
    