<template>
  <k-inside>
    <k-view class="k-analytics-view" v-if="ready">
      <k-header>{{ $t("paulmorel.fathom-analytics.analytics") }}</k-header>

      <template v-if="error">
        <k-box theme="negative">
          <k-text v-for="(error, index) in errors" :key="`error-${index}`">
            {{ error }}
          </k-text>
        </k-box>
      </template>

      <div v-if="!error">
        <k-icon class="fathom-analytics-loader" type="loader" v-show="loaded == false" position="center" size="medium" />
        <iframe
          @load="resize"
          class="fathom-analytics-iframe"
          v-bind:src="dashboardUrl"
          v-show="loaded"
          frameborder="0"
        ></iframe>
      </div>
    </k-view>
  </k-inside>
</template>

<style scoped>
.fathom-analytics-iframe {
  width: 1px;
  min-height: 400px;
  border-radius: 8px;
  min-width: 100%;
}
.fathom-analytics-loader {
  z-index: 1;
  animation: Spin .9s linear infinite;
}

</style>

<script>
import iframeResize from "iframe-resizer/js/iframeResizer";

export default {
  props: {
    config: {
      type: Object,
      default: () => ({
        siteId: false,
        sharePassword: false,
      })
    },
  },

  data: () => ({
    ready: false,
    loaded:false,
    error: false,
    errors: []
  }),

  methods: {
    resize(event) {

      iframeResize(
        {
          bodyBackground: "#efefef",
        },
        event.target
      );

      this.loaded = true;

    },
  },

  computed: {
    dashboardUrl()  {
      return `https://app.usefathom.com/share/${this.config.siteId}/kirby?password=${this.config.sharePassword}`;
    },
  },

  mounted() {
    
    // Check if Fiber exists as a Kirby version check

    if ( window.fiber !== undefined ) {
      // Currently running Kirby v3.6+, use props instead of custom API route
      this.ready = true;

    } else {
      // Currently running Kirby between v3.4.0 and v3.6.0, use API to pass in props from options

      this.$api
        .get("fathom-analytics")
        .then((response) => {
          this.config.siteId = response.siteId;
          this.config.sharePassword = response.sharePassword;
  
          if (!this.config.siteId) {
            this.error = true;
            this.errors.push(
              this.$t("paulmorel.fathom-analytics.siteId-missing")
            );
          }
        }).finally(() => {
          this.ready = true;
        });
    }
 
  },
};
</script>