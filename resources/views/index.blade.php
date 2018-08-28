@extends('layout')

@section('content')

  <!-- Section: intro -->
  <section id="intro" class="intro">
    <div class="slogan">
      <h1>ReRise</h1>
      <p><b>Re:Rise este o asociație non-profit <br>concentrată pe elaborarea și implementarea de soluții pentru reducerea riscului seismic.</b></p>
      <a href="/buildings-map/0" class="btn btn-skin scroll">Vezi harta</a>
    </div>
  </section>
  <!-- /Section: intro -->

  <!-- Section: about -->
  <section id="about" class="home-section text-center bg-gray">
    <div class="heading-about marginbot-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">

            <div class="section-heading">
              <h2>Despre noi</h2>
              <p>Re:Rise este o asociație non-profit
concentrată pe elaborarea și implementarea de soluții pentru reducerea riscului seismic.</p>
            </div>

          </div>
        </div>
      </div>
    </div>
   
  </section>
  <!-- /Section: about -->


  <!-- Section: services -->
  <section id="service" class="home-section text-center">

    <div class="heading-about marginbot-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">

            <div class="section-heading">
              <h2>Ghid Cutremur</h2>
              <p>sursa: <a href="https://fiipregatit.ro/ghid/cutremur/" target="_blank"> fiipregatit.ro</a></p>
            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-sm-4 col-md-4">

          <div class="service-box">
            <div class="service-icon">
              <i class="fa fa-code fa-3x"></i>
            </div>
            <div class="service-desc">
              <h5>Inainte de eveniment</h5>
              <ul>
                <li>
                  Executaţi lucrări de reparaţie şi întreţinere la clădirile care necesită acest lucru.
                </li>
                <li>
                  Nu faceţi modificări la clădiri, în vederea măririi sau micşorării unor spaţii, care afectează structura de rezistenţă a acestora;
                </li>
                <li>
                  Nu montaţi instalaţii grele (antene, instalaţii de ventilaţie/climatizare, etc.) pe elementele structurale sau nestructurale ale clădirii, dacă acestea afectează structura de rezistenţă.
                </li>
              </ul>

            </div>
          </div>

        </div>
        <div class="col-sm-4 col-md-4">

          <div class="service-box">
            <div class="service-icon">
              <i class="fa fa-suitcase fa-3x"></i>
            </div>
            <div class="service-desc">
              <h5>In timpul evenimentului</h5>
               <li>
                  Adăpostiţi-vă imediat într-un loc sigur şi rămâneţi calm pană la încetarea cutremurului.
                </li>
                <li>
                  Dacă sunteţi în interiorul unei clădiri rămâneţi pe loc, nu încercaţi să ieşi afară şi nu vă duceţi pe balcon.
                </li>
                <li>
                  Adăpostiţi-vă sub o masă, un birou sau o piesă solidă de mobilier şi ţineţi-vă bine de aceasta.
                </li>
            </div>
          </div>

        </div>
        <div class="col-sm-4 col-md-4">

          <div class="service-box">
            <div class="service-icon">
              <i class="fa fa-cog fa-3x"></i>
            </div>
            <div class="service-desc">
              <h5>Dupa eveniment</h5>
              <ul>
                 <li>
                Verificaţi dacă sunteţi răniţi şi apoi uitaţi-vă şi la persoanele din jur. În cazul în care sunt răniţi, asiguraţi primul ajutor, doar dacă vă pricepeţi.
              </li>
              <li>
                Fiţi atenţi la scări. S-ar putea ca mişcarea seismică să fi afectat rezistenţa acestora.
              </li>
              
              </ul>
            </div>
          </div>

        </div>
        
      </div>

      <a href="https://fiipregatit.ro/ghid/cutremur/" class="btn btn-skin scroll"
        target="_blank">Vezi mai mai multe</a>

    </div>
  </section>
  <!-- /Section: services -->



  <!-- Section: recent-earthquakes -->
  <section id="recent-earthquakes" class="home-section text-center bg-gray">
    <div class="heading-about marginbot-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">

            <div class="section-heading">
              <h2>Cutremure recente</h2>
              <ul>
                <li><a href="/earthquakes/all-romania">În România</a></li>
                <li><a href="/earthquakes/romania-past-hour">În România, ultima oră</a></li>
              </ul>
            </div>

          </div>
        </div>
      </div>
    </div>
   
  </section>
  <!-- /Section: recent-earthquakes -->

  <!-- Section: contact -->
  <section id="contact" class="home-section text-center">
    <div class="heading-contact marginbot-50">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">

            <div class="section-heading">
              <h2>Contacteaza-ne</h2>

            </div>

          </div>
        </div>
      </div>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-lg-8 col-md-offset-2">
          <div class="boxed-grey">
            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form action="" method="post" role="form" class="contactForm">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                <div class="validation"></div>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>

              <div class="text-center"><button type="submit" class="btn btn-skin">Send Message</button></div>
            </form>
          </div>

          <div class="widget-contact row">
            <div class="col-lg-6">
              <address>
                <strong>@ReRise.org</strong><br>
				          <a href="http://rerise.org">http://rerise.org </a><br>
				          <abbr title="Phone">P:</abbr> 0434 432 234
				      </address>
            </div>

            <div class="col-lg-6">
              <address>
				        <strong>Email</strong><br>
				        <a href="mailto:#">office@rerise.org</a><br/>
				      </address>
            </div>
          </div>
        </div>

      </div>

    </div>
 </section>


 @endsection