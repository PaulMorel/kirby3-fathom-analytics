panel.plugin("paulmorel/fathom-analytics", {
  components: {
    "k-fathom-analytics-view": {
      props: {
        url: String,
      },
      data() {
        return {
          loaded: false,
        };
      },
      computed: {
        // Fathom's shared dashboard has no theme parameter: it follows
        // `prefers-color-scheme`. Setting `color-scheme` on the iframe
        // sets that preference inside it, so the dashboard switches
        // with the Panel's own light/dark setting.
        theme() {
          return this.$panel.theme?.current ?? "light";
        },
      },
      template: `
        <k-panel-inside class="k-fathom-analytics-view">
          <k-header>
            {{ $t("paulmorel.fathom-analytics.analytics") }}

            <template v-if="url" #buttons>
              <k-button-group>
                <k-button
                  :link="url"
                  :responsive="true"
                  :text="$t('paulmorel.fathom-analytics.open')"
                  icon="open"
                  size="sm"
                  target="_blank"
                  variant="filled"
                />
              </k-button-group>
            </template>
          </k-header>

          <div v-if="url" class="k-fathom-analytics-frame" :data-loaded="loaded">
            <k-icon v-if="!loaded" type="loader" class="k-fathom-analytics-loader" />
            <iframe
              :src="url"
              :style="{ colorScheme: theme }"
              title="Fathom Analytics"
              @load="loaded = true"
            />
          </div>

          <k-box v-else icon="info" theme="info">
            <k-text :html="$t('paulmorel.fathom-analytics.siteId-missing')" />
          </k-box>
        </k-panel-inside>
      `,
    },
  },
});
