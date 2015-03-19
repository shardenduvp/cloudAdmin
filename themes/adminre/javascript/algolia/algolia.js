$(document).ready(function() {
	var algolia				=	new AlgoliaSearch("L8YWR0XFJ6", "4bba2c1bb6dc58cdac2c3a02780bc9e0");
	var skills				=	algolia.initIndex('skills');
	var services			=	algolia.initIndex('services');
	var industries			=	algolia.initIndex('industries');
	var baseDir				=	'';//'/test';
	var templateSkill		=	Hogan.compile('<div class="skill">'+'<a href="'+window.location.origin+baseDir+'/search/{{{name}}}"><div class="name">{{{ _highlightResult.name.value }}}</div></a>'+'</div>');
	var templateService		=	Hogan.compile('<div class="service">'+'<a href="'+window.location.origin+baseDir+'/search/{{{name}}}"><div class="name">{{{ _highlightResult.name.value }}}</div></a>'+'</div>');
	var templateIndustry	=	Hogan.compile('<div class="industry">'+'<a href="'+window.location.origin+baseDir+'/search/{{{name}}}"><div class="name">{{{ _highlightResult.name.value }}}</div></a>'+'</div>');
	$('#sup-search').typeahead({ hint: true }, [
		{
			source: skills.ttAdapter({ "hitsPerPage": 5 }),
			displayKey: 'name',
			templates: {
				header: '<div class="category">Skills</div>',
				suggestion: function(hit) {
				console.log(hit);			
				return templateSkill.render(hit);}
			}
		},
		{
			source: services.ttAdapter({ "hitsPerPage": 5 }),
			displayKey: 'name',
			templates: {
				header: '<div class="category">Services</div>',
				suggestion: function(hit) { return templateService.render(hit); }
			}
		},
		{
			source: industries.ttAdapter({ "hitsPerPage": 5 }),
			displayKey: 'name',
			templates: {
				header: '<div class="category">Industries</div>',
				suggestion: function(hit) { return templateIndustry.render(hit); }
			}
		}
	]).on('typeahead:selected', function($e, datum){
			var myString	=	datum.objectID;
			var arr			=	myString.split('_');
			if(arr[1]=='sk')
				$('#skill-search').val(datum.name);
			else if(arr[1]=='s')
				$('#service-search').val(datum.name);
			else if(arr[1]=='i')
				$('#industry-search').val(datum.name);
			
        }
    );;






});