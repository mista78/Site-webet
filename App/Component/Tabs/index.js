(function () {
  var afficherOnglet = function (a, animations) {
    if (animations === undefined) {
      animations = true;
    }
    var li = a.parentNode;
    var div = a.parentNode.parentNode.parentNode;
    var activeTab = div.querySelector('.tab-content.active');
    var aAfficher = div.querySelector(a.getAttribute('href'));
    if (li.classList.contains('active')) {
      return false;
    }
    div.querySelector('.tabs .active ').classList.remove('active');
    li.classList.add('active');

    if (animations) {
      activeTab.classList.add('fade');
      activeTab.classList.remove('in');
      var transitionend = function () {
        this.classList.remove('fade');
        this.classList.remove('active');
        aAfficher.classList.add('active');
        aAfficher.classList.add('fade');
        aAfficher.offsetWidth;
        aAfficher.classList.add('in');
        activeTab.removeEventListener('transitionend', transitionend);
      }
      activeTab.addEventListener('transitionend', transitionend);
      activeTab.addEventListener('webkitTransitionend', transitionend);
      activeTab.addEventListener('oTransitionend', transitionend);

    } else {
      aAfficher.classList.add('active');
      aAfficher.classList.remove('active');
    }
  }

  var tabs = document.querySelectorAll('.tabs a');
  for (var i = 0; i < tabs.length; i++) {
    tabs[i].addEventListener('click', function (e) {
      afficherOnglet(this);
    })
  }
  var hashchange = function (e) {
    var hash = window.location.hash;
    var a = document.querySelector('a[href="' + hash + '"]');
    if (a !== null && !a.classList.contains('active')) {
      afficherOnglet(a, e !== undefined);
    }
  }
  window.addEventListener('hashchange', hashchange);
  hashchange();
})();