module.exports = {
  title: 'QuasarWP',
  description: 'Wordpress theme with Quasar Framework',
  base: '/quasarwp/',
  themeConfig: {
    nav: [
      { text: 'About', link: '/' },
      { text: 'Menu Components', link: '/menu-components/' },
      { text: '\"Mix in\" Some Code', link: '/mixin-code/' },
      { text: 'Github', link: 'https://github.com/amimaro/quasarwp', target:'_blank' }
    ],
    sidebar: [
      ['/', 'About'],
      {
        title: 'Menu Components',
        path: '/menu-components/',
        collapsable: false,
        sidebarDepth: 1,
        children: [
          ['/menu-components/', 'Menu Components'],
          '/menu-components/qwp-simple-btn',
          '/menu-components/qwp-separator',
          '/menu-components/qwp-label',
          '/menu-components/qwp-logo',
          '/menu-components/qwp-space',
          '/menu-components/qwp-search',
          '/menu-components/qwp-custom-btn',
        ]
      },
      ['/mixin-code/', '\"Mix in\" Some Code'],
      ['https://github.com/amimaro/quasarwp', 'Github', '_blank'],
    ]
  }
}
