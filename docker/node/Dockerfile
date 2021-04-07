FROM node:12

USER node
RUN mkdir -p /home/node/app
WORKDIR /home/node/app

COPY --chown=node:node ./react/package*.json .
COPY --chown=node:node ./react/yarn.lock .

RUN yarn --pure-lockfile

COPY --chown=node:node . .

EXPOSE 3000

CMD ["yarn", "start"]