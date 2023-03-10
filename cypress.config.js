const { defineConfig } = require("cypress");

module.exports = defineConfig({
  projectId: 'f5pvjj',
  e2e: {
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
