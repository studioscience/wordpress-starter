setTimeout(function () {
  const $ = jQuery;

  // declare custom admin methods
  const removeTaxonomyParent = () => {
    if ($(".taxonomy-collections").length) {
      $("#parent").parent().remove();
    }
  };

  // call custom methods
  removeTaxonomyParent();
}, 50);
