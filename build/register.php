<?php
/**
 * Template Name: Registration Form
 *
 * @package refur
 */

get_header(); ?>

<div id="primary" class="content-area col-xs-12">
  <main id="main" class="site-main" role="main">
    <?php if($_POST['email']): ?>
      <?php refur_submit_registration(); ?>
      <p>
            Ďakujeme za vyplnenie registračného formulára. Žiadosť bude spracovaná administrátorom fóra do 2 pracovných dní od doručenia
            žiadosti.
      </p>
      <p>
        V prípade, že tvoja žiadosť bude akceptovaná, obdržíš prihlasovacie meno a heslo na zadanú emailovú adresu.
      </p>
    <?php else: ?>
    <article id="registration">
      <header class="entry-header">
        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h1>'); ?>
      </header><!-- .entry-header -->
      <div class="entry-content">
        <form id="registration-form" method="post">
          <p>
            Po vyplnení registračného formulára bude tvoja žiadosť spracovaná administrátorom fóra do 2 pracovných dní od doručenia
            žiadosti.
            V prípade, že tvoja žiadosť bude akceptovaná, obdržíš prihlasovacie meno a heslo na zadanú emailovú adresu.
          </p>
          
          <p>
            Hlavným predpokladom otvorenej diskusie je zachovanie <strong>plnej anonymity</strong>, ktorú ti garantujeme. 
            Členov nášho klubu si overujeme a nevpúšťame medzi seba nepovolaných. Na to slúži prihlasovanie z firemnej e-mailovej adresy, 
            aby sa pod xy@gmail.com nemohol zaregistrovať niekto nepovolaný.</p>

            <p>
            <strong>Nezdieľaj žiadne firemné know how</strong>, ale to, s čím sa stretávaš vo svojej každodennej práci a čo od teba maloobchodné siete požadujú. 
          </p>
          <div class="form-group">
            <label for="username">Užívateľské meno</label>
            <input type="text" class="form-control" id="username" name="username"
                   placeholder="Sem môžeš zadať užíateľské meno, pod ktorým budeš vystupovať na fóre.">
          </div>

          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
                   placeholder="Sem zadaj svoj email, pomocou ktorého môžeme s tebou komunikovať.">
          </div>

          <div class="checkbox">
            <label>
              <input id="legal" type="checkbox" name="legal"> Potvrdzujem, že som sa podrobne oboznámil(-a) a súhlasím s 
              <a href="<?= get_site_url(); ?>/vseobecne-podmienky-pouzivania/">Všeobecné podmienky používania serveru kamforum.sk</a>. 
              Ako dotknutá osoba súhlasím týmto so spracúvaním mojich osobných údajov, uvedených vo formulári vyššie, na účely používania tejto služby a ďalších služieb
              kamforum.sk a za podmienok uvedených v Všeobecné podmienky používania serveru kamforum.sk. 
              Súhlas udeľujem na dobu neurčitú a som si vedomý, že ho môžem kedykoľvek odvolať.
            </label>
          </div>
          <button id="submit-button" type="submit" class="btn btn-primary" disabled="disabled">Odoslať registračný formulár</button>
        </form>
      </div><!-- .entry-content -->
    </article><!-- #post-## -->
    <?php endif; ?>

  </main><!-- #main -->
</div><!-- #primary -->

<script src="<?= bloginfo( 'stylesheet_directory' ); ?>/js/registration.js" defer ?>//--- Registration Form JS Scripts for KAM Forum --></script>
<?php get_footer(); ?>
