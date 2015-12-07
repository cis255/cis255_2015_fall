//revealing module pattern
//http://addyosmani.com/resources/essentialjsdesignpatterns/book/#revealingmodulepatternjavascript

var svsu = svsu || (function(){

  var api_base = 'https://api.svsu.edu/',
      renderCourse = _.template('<%= title %>'),
      course_template = '<div><%= title %> - <%= section %></div>';

  function buildCourseURI(data) {
    if(data){
	return api_base + 'courses?' + data;
    }
    return api_base + 'courses';
  }

  function courseToHTML(course) {
    return _.template(course_template, course);
  }

  function setTemplate(template) {
    renderCourse = _.template(template);
  }

  function formatHTML(data) {
    return _.map(data.courses, function(course){
      return renderCourse(course);
    });
  }

  function formatJSON(json) {
    return JSON.stringify(json, null, 2);
  }

  return {
    buildCourseURI: buildCourseURI,
    formatHTML: formatHTML,
    formatJSON: formatJSON,
    setTemplate: setTemplate
  }

})();