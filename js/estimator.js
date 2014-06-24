var ProjectEstimator = (function ($) {

	"use strict";

	var c, ProjectEstimator, project, view, submitURL;

	
	submitURL = "estimate.php";

	ProjectEstimator = {

		cache: {
			topEstimateButton: $('#js-estimate-start'),
			taskContainer: $('#js-task-container'),
			pagesContainer: $('#js-pages-container'),
 
			// budget output
			budgetAverage: $('#output .js-average span'),
			budgetAverageParent: $('#output .js-average'),

			// budget bar
			barContainer: $('#output'),
			bar: $('#output .js-bar'),

			// final page stuff
			total: $('#estimate .total .data'),
			scopeList: $('.invoice .js-scope'),
			submitButton: $('#submit'),
                        websiteProject: $('#websiteProject'),

			// views
			questions: $('.js-question'),
			entries: $('.js-entry'),
			finalEntry: $('.js-entry-final'),
			currentDataSelector: null
		},

		ready: function () {
			c = ProjectEstimator.cache;
			
			
			
			view = new View(c);
            project = new Project(view);
			view.reset(project);
		},

		initializeNewProject: function () {
			project = new Project(view);
			view.reset(project);
		},

		getShareURL: function () {
			return shareURL;
		},

		getSubmitURL: function () {
			return submitURL;
		}
	};
	
	ProjectEstimator.ready();

	return ProjectEstimator;
})(window.jQuery);