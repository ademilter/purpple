$.getJSON("//adem.dropmark.com/368075.json", function (data) {
  var source = $("#temp-link").html();
  var template = Handlebars.compile(source);
  var result = template(data);
  $(".Links").append(result);
});

Handlebars.registerHelper('hostname', function () {
  var url = Handlebars.escapeExpression(this.link);
  var link = document.createElement('a');
  link.href = url;
  return link.hostname;
});