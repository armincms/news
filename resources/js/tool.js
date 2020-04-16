Nova.booting((Vue, router, store) => {
  router.addRoutes([
    {
      name: 'news',
      path: '/news',
      component: require('./components/Tool'),
    },
  ])
})
