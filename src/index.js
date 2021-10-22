import AnalyticsView from "./components/AnalyticsView.vue";

panel.plugin("paulmorel/fathom-analytics", {
  // Kirby v3.6 and up
  components: {
    'analytics': AnalyticsView,
  },
  // Kirby v3.4.0 to 3.5.7.1 and below
  views: {
    'analytics': {
      component: AnalyticsView,
      icon: "chart",
      menu: true
    }
  }
});