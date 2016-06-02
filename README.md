## Environment Setup

### Getting Started

#### Vagrant

1. Download and install [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
2. Download and install [vagrant](http://www.vagrantup.com/downloads.html)
3. Clone [ravenwilde/south-bay-bessie][n1] into `~/Documents/Projects/GLOS`

```bash
# The path can be anything
mkdir -p ~/Documents/Projects/GLOS
cd ~/Documents/Projects/GLOS
git clone https://github.com/ravenwilde/south-bay-bessie .
```

Once the repo is cloned you can initialize vagrant. You'll first need to download the virtual box image since it's not included in the repo directly.

```bash
wget http://chaoscontrol.org/Vagrant_Debian8.box .
vagrant up --provision
```

You'll need to configure some DNS entries in your `/etc/hosts` file.

```bash
echo 10.10.10.10 glos.dev | sudo tee -a /etc/hosts
```

#### Laravel/Misc Config

Now that Vagrant is up and running you'll need to update Laravel's dependencies.
```bash
# From your project directory
vagrant ssh

cd /var/www
composer install
```

With that you should be able to visit the web app from your browser at http://glos.dev

#### Database

@TBD

### Testing

@TBD

#### Unit Tests

@TBD

#### Acceptance Tests

@TBD
