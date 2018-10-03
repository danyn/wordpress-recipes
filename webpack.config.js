const path = require('path'),
settings = require('./settings');
const VueLoaderPlugin = require('vue-loader/lib/plugin');

let $appEntryModule = 

module.exports = {
  entry: {
    App: settings.themeLocation + "assets/js/scripts.js"
  },
  output: {
    path: path.resolve(__dirname, settings.themeLocation + "assets/js"),
    filename: "scripts-bundled.js"
  },
  resolve: {
    alias: {
      'vue$': 'vue/dist/vue.esm.js' // 'vue/dist/vue.common.js' for webpack 1
    }
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: 'babel-loader',
          options: {
            presets: ['@babel/preset-env']
          }
        }
      },
      {
        test: /\.vue$/,
        loader: 'vue-loader'
      },
        // this will apply to both plain `.css` files
      // AND `<style>` blocks in `.vue` files
      {
        test: /\.css$/,
        use: [
          'vue-style-loader',
          'css-loader'
        ]
      }

    ]
  },
  plugins: [
    // make sure to include the plugin!
    new VueLoaderPlugin()
  ],
  mode: 'development'
}



