# 🎵 Spotify Viral Tracker

Este projeto em Laravel consome a **API do Spotify** para exibir as **50 músicas virais mais populares para Reels no Instagram**, com base em uma playlist pública. A interface é limpa, responsiva (TailwindCSS) e apresenta as músicas com título, artista, álbum, duração e link direto para o Spotify.

## 🚀 Funcionalidades

- Integração com API pública do Spotify
- Autenticação automática via Client Credentials
- Exibição dos dados da playlist (nome da música, artista, álbum, duração)
- Link direto para a música no Spotify
- Design responsivo com TailwindCSS
- Atualização dinâmica baseada nos dados reais da playlist

## 🛠️ Tecnologias utilizadas

- Laravel 12
- PHP 8+
- Tailwind CSS
- Spotify Web API
- Laravel HTTP Client (Guzzle)

## 🔧 Instalação

```bash
# Clone o repositório
git clone https://github.com/seu-usuario/spotify-viral-tracker.git

# Acesse a pasta do projeto
cd spotify-viral-tracker

# Instale as dependências
composer install

# Copie o arquivo de ambiente
cp .env.example .env

# Cria as tabelas do banco de dados
php artisan migrate
