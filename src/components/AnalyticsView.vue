<template>
  <k-view class="k-analytics-view" v-show="loaded">
    <k-header>{{ $t("paulmorel.fathom-analytics.analytics") }}</k-header>

    <template v-if="error">
      <k-box theme="negative">
        <k-text v-for="(error, index) in errors" :key="`error-${index}`">
          {{ error }}
        </k-text>
      </k-box>
    </template>

    <div v-show="!error">
      <k-loader v-if="iframe.loaded == false" position="center" />
      <iframe
        @load="resize"
        class="fathom-analytics-iframe"
        v-bind:src="dashboardUrl"
        frameborder="0"
      ></iframe>
    </div>
  </k-view>
</template>

<style scoped>
.fathom-analytics-iframe {
  width: 1px;
  min-height: 400px;
  border-radius: 8px;
  min-width: 100%;
}
</style>

<script>
import iframeResize from "iframe-resizer/js/iframeResizer";

export default {
  data: () => ({
    loaded: false,
    error: false,
    errors: [],
    iframe: {
      loaded: false,
      initialized: false,
    },
    config: {
      siteId: false,
      sharePassword: false,
    },
  }),

  methods: {
    resize(event) {
      this.iframe.loaded = true;

      iframeResize(
        {
          bodyBackground: "#efefef",
        },
        event.target
      );
    },
  },

  computed: {
    dashboardUrl()  {
      return `https://app.usefathom.com/share/${this.config.siteId}/kirby?password=${this.config.sharePassword}`;
    },
  },

  mounted() {
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
        this.loaded = true;
      });
  },
};
</script>