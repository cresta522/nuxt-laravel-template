FROM node:16.15-alpine
EXPOSE 3333
WORKDIR /app

RUN apk update && \
    apk upgrade

RUN npm install -g @vue/cli nuxt create-nuxt-app

CMD ["npm", "run", "dev"]