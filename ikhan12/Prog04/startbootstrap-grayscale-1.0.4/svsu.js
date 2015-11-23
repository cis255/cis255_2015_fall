var svsu = svsu || (function(){
  // loading svsu api
  var api_base = 'https://api.svsu.edu/',
      renderCourse = _.template('<%= title %>'),
      course_template = '<div><%= title %> - <%= section %></div>';
	//if data loads, returns data
  function buildCourseURI(data) {
    if(data){
	return api_base + 'courses?' + data;
    }
    return api_base + 'courses';
  }
	// takes data and puts it in html form
  function courseToHTML(course) {
    return _.template(course_template, course);
  }
	// organizes the data
  function setTemplate(template) {
    renderCourse = _.template(template);
  }
	
  function formatHTML(data) {
    return _.map(data.courses, function(course){
      return renderCourse(course);
    });
  }
	//formats the json results
  function formatJSON(json) {
    return JSON.stringify(json, null, 2);
  }
	//returns formatted data
  return {
    buildCourseURI: buildCourseURI,
    formatHTML: formatHTML,
    formatJSON: formatJSON,
    setTemplate: setTemplate
  }

})();