const webpack = require('webpack')
const { CleanWebpackPlugin } = require('clean-webpack-plugin')
const RemoveEmptyScriptsPlugin = require('webpack-remove-empty-scripts')
const { merge } = require('webpack-merge')
const common = require('./webpack.config.common')

module.exports = merge(common, {
   mode: 'production',
   plugins: [
      new CleanWebpackPlugin(),
      new RemoveEmptyScriptsPlugin(),
      new webpack.DefinePlugin({
         'process.env': {
            NODE_ENV: '"production"'
         }
      }),
      new webpack.ProgressPlugin(),
   ],
   stats: 'minimal',
   performance: {
      hints: false,
      maxEntrypointSize: 512000,
      maxAssetSize: 512000,
   },
})
