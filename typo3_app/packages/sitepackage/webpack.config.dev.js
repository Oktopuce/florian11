const webpack = require('webpack')
const { merge } = require('webpack-merge')
const common = require('./webpack.config.common')

module.exports = merge(common, {
   devtool: 'eval',
   mode: 'development',
   stats: 'minimal',
   plugins: [
      new webpack.DefinePlugin({
         'process.env': {
            NODE_ENV: JSON.stringify(process.env.NODE_ENV || 'development')
         }
      }),
      new webpack.ProgressPlugin(),
   ],
})
