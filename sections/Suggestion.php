<section class="Suggestion">

  <div class="container">
    <div class="row">
      <div class="col-md-offset-4 col-md-8">
        <h2 class="Section-title">Suggestion</h2>
      </div>
    </div>
  </div>

  <div class="container-xl">
    <ul class="Links"></ul>
  </div>

  <script id="temp-link" type="text/x-handlebars-template">
    {{#each items}}
    <li class="Link">
      <div class="container">
        <div class="row">
          <div class="Link-meta col-xs-12 col-md-3">
            <h5 class="Link-meta-domain">{{hostname}}</h5>
            <time class="Link-meta-date">{{created_at}}</time>
          </div>
          <div class="Link-content col-xs-12 first-xs last-md col-md-offset-1 col-md-8">
            <h3 class="Link-content-title" rel="nofollow">
              <a href="{{link}}">{{name}}</a>
            </h3>
            {{#if description}}
            <div class="Link-content-detail">{{description}}</div>
            {{/if}}
          </div>
        </div>
      </div>
    </li>
    {{/each}}
  </script>

  <!--<div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-offset-4 col-md-8">
        <a class="Section-more btn" href="/highlight">More...</a>
      </div>
    </div>
  </div>-->

</section>
<!-- /.Suggestion -->