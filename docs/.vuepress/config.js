module.exports = {
  title: 'QuasarWP',
  description: 'Wordpress theme with Quasar Framework',
  themeConfig: {
    nav: [
      { text: 'Home', link: '/' },
      { text: 'About', link: '/about/' },
      { text: 'Contact', link: '/contact/' }
    ],
    sidebar: [
      ['/', 'Home'],
      ['/about/', 'About'],
      ['/contact/', 'Contact']
    ]
  }
}
