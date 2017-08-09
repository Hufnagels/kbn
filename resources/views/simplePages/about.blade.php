@extends('layouts.app')
@section('title',' - About')
@section('styles')
<style>
#app {
    margin-right: 0px;
}
.aboutUs .notification {
    font-size: .9rem;
}
.aboutUs .notification .title {
    font-size: 1.25rem;
    font-weight:600;
}
</style>
@endsection
@section('content')

<section id="aboutUs" class="hero is-warning m-b-20">
  <div class="hero-body">
    <div class="container">
      <h1 class="title has-text-centered">
        Rólunk
      </h1>
      <h2 class="subtitle has-text-centered">
        Oktatási elveink
      </h2>
    </div>
  </div>
</section>

<div class="container aboutUs">
  <div class="columns">
    <div class="column is-two-thirds">

      <div class="tile is-ancestor">
        <div class="tile is-vertical is-12">
          <div class="tile">
            <div class="tile is-parent is-vertical">
              <article class="tile is-child notification is-primary">
                <p class="title">Kiket tanítunk?</p>
                <p class="subtitle"></p>
                <div class="content">
                  A Kódvetők műhely informatikai ismereteket, programozást és robotikát oktat, a 7-14 éves korosztály számára, azzal a céllal, hogy a gyerekek felnőtté válva, beszéljék a digitális világnyelvet.
                </div>
              </article>
              <article class="tile is-child notification is-warning">
                <p class="title">Mi a célunk?</p>
                <p class="subtitle"></p>
                <div class="content">
                  A tágabb és szűkebb környezetében, magabiztosan eligazodó, az információszerzés- és kezelés technikáit ismerő, az infokommunikációs különböző formáiban jártas gyermekek nevelése.
                </div>
              </article>
            </div>
            <div class="tile is-parent">
              <article class="tile is-child notification is-info">
                <p class="title">Eszközhasználat</p>
                <p class="subtitle"></p>
                <div class="content">
                  A mai kor kihívásai között megkerülhetetlen az információtechnológiai megoldások, az IT-eszközök, alkalmazások használata, ha lépést akarunk tartani versenytársainkkal. Igaz ez gyermekeinkre is, akik a reményteli következő - generációt képviselik és az iskolában, valamint az otthoni tanulás és szabadidős tevékenység során is napi szinten használják a saját informatikai eszközeiket, előszeretettel szörföznek a nyílt interneten.
                </div>
              </article>
            </div>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child notification is-danger">
              <p class="title">Mi kell?</p>
              <p class="subtitle"></p>
              <div class="content">
                Gyermekeink érdeklődése sokrétű és szerteágazó, amely jó alapot jelenthet a további digitális képességeik kialakításában. Ugyanakkor sok esetben ez a fajta internetes jelenlét cél nélküli és megfelelő mentori segítség nélkül hiábavaló. Ahhoz, hogy ezen változtatni lehessen, komoly összefogásra és koncepcionálisan átgondolt oktatási programra, jó motivációs légkörre és a gazdasági életben is tapasztalattal rendelkező jól képzett informatikai oktatókra, IT-szakemberekre, mint támogatókra van szükség.
              </div>
            </article>
          </div>
          <div class="tile is-parent">
            <article class="tile is-child notification is-dark">
              <p class="title">Probléma a különóra? - Nem biztos!</p>
              <p class="subtitle">Nehézségek</p>
              <div class="content">
                Mivel tanítási rendszerünk, a hagyományos oktatási rendszeren kívüli, tehát kvázi „külön óra”, ezért a következő nehézségekkel találjuk szembe magunkat.
                <br>
                A gyerekek különböző felkészítést kapnak az iskolában.
Heterogén viselkedési minták.
A leendő diákok fáradtak, hiszen már lement az első „műszak”.
Nevelésre csak korlátozottan vállalkozhatunk.
Viszonylag rövid tanítási időszak.
<br>
<p class="subtitle">Válaszunk</p>
Nem támaszkodunk az iskolában tanultakra, ha szükséges kiegészítjük.
Mindent szabad ami nem tilos, kevés korlát, szabad pihenési lehetőség, állandóan „snack” készlet, gyümölcsök. Szabad mozgási lehetőség biztosítása. inspiráló környezet , a tantermek nem is hasonlítanak egy iskolára.
Nem célunk a nevelés, de küzdünk minden gyermekért, ha nem tartja be a szabályainkat, melyek a szabadságra, szolidaritásra, tiszteletre épülnek.
              </div>
            </article>
          </div>
        </div>

      </div>

    </div>
    <div class="column">
      <div class="notification is-primary">
        <p class="title">Felfedezés öröme</p>
        Minden gyermek számára meg kell engedni a felfedezés örömét
      </div>

      <div class="notification is-info">
        <p class="title">Inspiráló környezet</p>
        A gyermek számára, olyan környezetet kell biztosítani, ami örömet nyújt és fejlesztő tevékenységre motivál.
      </div>

      <div class="notification is-success">
        <p class="title">Projekt alapú oktatás</p>
        A gyermekek feladatokat (projekteket) vállalhatnak, akár egyedül vagy csoportosan, melyet elvégeznek majd beszámolnak eredményeikről a közösségnek.
      </div>

      <div class="notification is-warning">
        <p class="title">Optimális eszközrendszer</p>
        Biztosítani kell a fejlődéshez szükséges optimális eszközrendszert.
      </div>

      <div class="notification is-danger">
        <p class="title">Önellenőrzés</p>
        Közös megbeszéléseken, helyzetelemzéseken kerül sor a gyermekek tudásának önellenőrzésére, korrekciókra.
      </div>
    </div>
  </div>
</div>


@endsection
