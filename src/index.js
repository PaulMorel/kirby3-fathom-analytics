import AnalyticsView from "./components/AnalyticsView.vue";

panel.plugin("paulmorel/fathom-analytics", {
  views: {
    ['analytics']: {
      component: AnalyticsView,
      icon: "chart",
      label: 'Analytics',
      menu: true
    }
  }
});
