# FrontEnd

#### 参考

https://niwakatech.info/docker-nuxt-vue/#toc5

#### 詳細

`["npm", "run", "dev"]` は最初に書かない

`docker-compose run frontend` で必要なコマンド打っていく

`docker-compose run frontend npx create-nuxt-app` コマンドで以下設定

```
? UI framework: Vuetify.js
? Nuxt.js modules: Axios - Promise based HTTP client, Progressive Web App (PWA)
? Linting tools: ESLint, Prettier
? Testing framework: Jest
? Rendering mode: Universal (SSR / SSG)
? Deployment target: Server (Node.js hosting)
? Development tools: (Press <space> to select, <a> to toggle all, <i> to invert selection)
? Continuous integration: GitHub Actions (GitHub only)
? What is your GitHub username? cresta522 
? Version control system: Git
```

この後諸々長時間設定された後、

```
  To get started:

        npm run dev

  To build & start for production:

        npm run build
        npm run start

  To test:

        npm run test
```

と表示されるのでDockerFileに
`["npm", "run", "dev"]`
追記。

#### docker特有の注意

`front`の`package.json`はデフォとは異なるためRepository参照

# Backend

## setup

### 権限やけくそコマンド

`docker-compose exec -u root backend chmod 777 -R ./`

`docker-compose exec -u root backend chmod 777 -R ./storage`

### laravel

`docker-compose exec -u root backend composer create-project --prefer-dist laravel/laravel . "8.x"`

### テスト

`docker-compose exec backend php artisan test --env=testing`

### ide-helper

`docker-compose exec -u root backend composer require --dev barryvdh/laravel-ide-helper`  
`docker-compose exec -u root backend php artisan ide-helper:generate`  
`docker-compose exec backend php artisan ide-helper:models -W -R`

### dbal

カラム変更で必要  
`docker-compose exec -u root backend composer require doctrine/dbal`